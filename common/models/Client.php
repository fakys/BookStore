<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string|null $passport_series
 * @property string|null $passport_number
 * @property string|null $email
 * @property string|null $avatar
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Order[] $orders
 */
class Client extends \yii\db\ActiveRecord implements IdentityInterface
{
    use ModelsTrait;

    public $password_confirm;
    public $authKey;
    public $rememberMe;

    private $client_statistics=[];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    public static function ruTableName()
    {
        return 'Клиенты';
    }

    public function beforeSave($insert)
    {
        $this->upload_image('avatar', 'clients_image');
        $this->create_unique_key();
        $this->hashPassword();
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'password_confirm', 'password', 'patronymic', 'passport_series', 'passport_number', 'email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['surname', 'patronymic', 'passport_series', 'passport_number', 'email', 'avatar', 'unique_key'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['unique_key'], 'unique'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public static function getMainFields()
    {
        return [
            'id',
            'name',
            'surname',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'passport_series' => 'Серия паспорта',
            'passport_number' => 'Номер паспорта',
            'email' => 'Email',
            'avatar' => 'Фотография',
            'unique_key' => 'Уникальный ключ',
            'password'=>'Пароль',
            'password_confirm'=>'Повторите пароль',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */


    public function login($model='')
    {
        if($model){
            if(Yii::$app->user->login($model, $this->rememberMe)){
                return true;
            }
            return false;
        }
        $user = self::find()->where(['email'=>$this->email])->one();
        if(Yii::$app->security->validatePassword($this->password, $user->password)){
            if(Yii::$app->user->login($user, $this->rememberMe)){
                return true;
            }
        }
        $this->addError('email', 'Не верный логин или пароль');
        return false;
    }

    public function get_statistics(): array
    {
        if($this->client_statistics){
            return  $this->client_statistics;
        }
        $clients = self::find()->all();
        $client_with_books=[];
        $client_without_books=[];
        $percent_with_books=0;
        $percent_without_books=0;
        foreach ($clients as $val){
            $client_issued =$val->getIssuedOrder();
//            dd($clients[4]->getReturnOrder());
            if($client_issued && count($val->getReturnOrder())<count($val->getOrders()->all())){
                $client_with_books[]=$val;
            }else{
                $client_without_books[]=$val;
            }
        }
        if($clients&&$client_with_books){
            $percent_with_books = round(count($client_with_books)/count($clients)*100);
        }
        if($clients&&$client_without_books){
            $percent_without_books = round(count($client_without_books)/count($clients)*100);
        }
        $this->client_statistics = ['client_with_books'=>$client_with_books, 'percent_with_books'=>$percent_with_books, 'client_without_books'=>$client_without_books, 'percent_without_books'=>$percent_without_books];
        return $this->client_statistics ;
    }


    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['unique_key' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function getOrders()
    {
        return $this->hasMany(Order::class, ['client_id' => 'id']);
    }
    public function getIssuedOrder()
    {
        $orders = $this->getOrders()->all();
        $arr_issued=[];
        if($orders){
            foreach ($orders as $order){
                $issued = $order->getIssuedOrders();
                if($issued){
                    $arr_issued[] = $issued;
                }
            }

        }
        return $arr_issued;
    }
    public function getReturnOrder()
    {
        $orders = $this->getOrders()->all();
        $arr_issued=[];
        if($orders){
            foreach ($orders as $order){
                $issued = $order->getBooksReturn()->one();
                if($issued){
                    $arr_issued[] = $issued;
                }
            }

        }
        return $arr_issued;
    }
}
