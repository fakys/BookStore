<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;

/**
 * This is the model class for table "book_returns".
 *
 * @property int $id
 * @property string|null $number_returns
 * @property int|null $order_id
 * @property int|null $worker_id
 * @property int|null $condition_book_id
 * @property bool|null $will_return
 * @property string|null $date_return
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ConditionBook $conditionBook
 * @property Order $order
 * @property Worker $worker
 */
class BookReturn extends \yii\db\ActiveRecord
{
    use ModelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_returns';
    }

    public static function ruTableName()
    {
        return 'Возврат книг';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'worker_id', 'condition_book_id'], 'required'],
            [['order_id', 'worker_id', 'condition_book_id'], 'default', 'value' => null],
            [['will_return'], 'boolean'],
            [['date_return', 'created_at', 'updated_at'], 'safe'],
            [['number_returns', 'unique_key'], 'string', 'max' => 255],
            [['number_returns'], 'unique'],
            [['unique_key'], 'unique'],
        ];
    }

    public static function getMainFields()
    {
        return [
            'id',
            'number_returns',
            'date_return',
        ];
    }
    public function beforeSave($insert)
    {
        $this->create_fk(Order::class, 'order_id');
        $this->create_fk(Worker::class, 'worker_id');
        $this->create_fk(ConditionBook::class, 'condition_book_id');
        $this->create_unique_key();
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number_returns' => 'Номер возврата',
            'order_id' => 'Заказ',
            'worker_id' => 'Работник',
            'condition_book_id' => 'Состояние книги',
            'will_return' => 'Возвращен',
            'date_return' => 'Дата возврата',
            'unique_key' => 'Уникальный ключ',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
        ];
    }

    /**
     * Gets query for [[ConditionBook]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConditionBook()
    {
        return $this->hasOne(ConditionBook::class, ['id' => 'condition_book_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
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
}
