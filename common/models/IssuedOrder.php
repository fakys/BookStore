<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;

/**
 * This is the model class for table "issued_orders".
 *
 * @property int $id
 * @property int|null $order_id
 * @property string|null $date_issue
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Order $order
 */
class IssuedOrder extends \yii\db\ActiveRecord
{
    use ModelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'issued_orders';
    }

    public static function ruTableName()
    {
        return 'Выданные заказы';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id'], 'default', 'value' => null],
            [['date_issue', 'created_at', 'updated_at'], 'safe'],
            [['unique_key'], 'string', 'max' => 255],
            [['unique_key'], 'unique'],
        ];
    }

    public static function getMainFields()
    {
        return [
            'id',
            'unique_key',
            'created_at',
        ];
    }


    public function beforeSave($insert)
    {
        $this->create_fk(Order::class, 'order_id');
        $this->get_date('date_issue');
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
            'order_id' => 'Заказ',
            'date_issue' => 'Дата выдачи',
            'unique_key' => 'Уникальный ключ',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
        ];
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
}
