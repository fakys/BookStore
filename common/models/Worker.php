<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "workers".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string|null $passport_series
 * @property string|null $passport_number
 * @property string|null $email
 * @property string|null $avatar
 * @property int|null $position_id
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 */
class Worker extends \yii\db\ActiveRecord implements IdentityInterface
{
    use ModelsTrait;


    public $authKey;

    public $rememberMe;
    public $password_confirm;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers';
    }

    public static function ruTableName()
    {
        return 'Работники';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'password_confirm', 'password', 'patronymic', 'passport_series', 'passport_number', 'email'], 'required'],
            [['position_id'], 'default', 'value' => null],
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
            'surname'
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
            'position_id' => 'Должность',
            'password'=>'Пароль',
            'password_confirm'=>'Повторите пароль',
            'unique_key' => 'Уникальный ключ',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
        ];
    }

    public function getPosition()
    {
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }

    public function beforeSave($insert)
    {
        $this->upload_image('avatar', 'workers_image');
        $this->create_fk(Position::class, 'position_id');
        $this->create_unique_key();
        $this->hashPassword();
        return parent::beforeSave($insert);
    }
    public function login()
    {
        $user = self::find()->where(['email'=>$this->email])->one();
        if(Yii::$app->security->validatePassword($this->password, $user->password)){
            if(Yii::$app->user->login($user, $this->rememberMe)){
                return true;
            }
        }
        $this->addError('email', 'Не верный логин или пароль');
        return false;
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
}
