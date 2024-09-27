<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use DateTime;
use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string|null $number
 * @property int|null $book_id
 * @property int|null $count
 * @property int|null $client_id
 * @property int|null $worker_id
 * @property bool|null $sent
 * @property bool|null $came
 * @property string|null $dispatch_date
 * @property string|null $arrival_date
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Book $book
 * @property BookReturn[] $bookReturns
 * @property Client $client
 * @property IssuedOrder[] $issuedOrders
 * @property Worker $worker
 */
class Order extends \yii\db\ActiveRecord
{
    use ModelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    public static function ruTableName()
    {
        return 'Заказы';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'client_id', 'worker_id'], 'required'],
            [['book_id', 'count', 'client_id', 'worker_id'], 'default', 'value' => null],
            [['count'], 'integer'],
            [['sent', 'came'], 'boolean'],
            [['dispatch_date', 'arrival_date', 'created_at', 'updated_at'], 'safe'],
            [['number', 'unique_key'], 'string', 'max' => 255],
            [['number'], 'unique'],
            [['unique_key'], 'unique'],
        ];
    }
    public function get_arrival_date()
    {
        $date = new DateTime($this->dispatch_date);
        $days = $this->getBook()->one()->delivery_time_days;
        if($days){
            $date->modify("+$days day");
        }
        $this->arrival_date = $date->format('Y-m-d H:i');
    }

    public function beforeSave($insert)
    {
        if($insert){
            $this->create_unique_key();
            $this->create_fk(Client::class, 'client_id');
            $this->create_fk(Worker::class, 'worker_id');
            $this->create_fk(Book::class, 'book_id');
            $this->number = uniqid();
        }
        if($this->sent){
            $this->get_date('dispatch_date');
            $this->get_arrival_date();
        }
        return parent::beforeSave($insert);

    }

    public static function getMainFields()
    {
        return [
            'id',
            'number',
            'dispatch_date',
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер заказа',
            'book_id' => 'Книга',
            'count' => 'Количество',
            'client_id' => 'Клиент',
            'worker_id' => 'Работник',
            'sent' => 'Отправлен',
            'came' => 'Прибыл',
            'dispatch_date' => 'Дата отправки',
            'arrival_date' => 'Дата прихода',
            'unique_key' => 'Уникальный ключ',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
    }

    /**
     * Gets query for [[BookReturns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookReturns()
    {
        return $this->hasMany(BookReturn::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[IssuedOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssuedOrders()
    {
        return $this->hasMany(IssuedOrder::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::class, ['id' => 'worker_id']);
    }

    public function getBooksReturn()
    {

        return $this->hasMany(BookReturn::class, ['order_id' => 'id']);
    }
}
