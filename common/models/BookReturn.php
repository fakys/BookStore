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
            [['order_id', 'worker_id'], 'required'],
            [['order_id', 'worker_id', 'condition_book_id'], 'default', 'value' => null],
            [['will_return'], 'boolean'],
            [['date_return', 'created_at', 'updated_at'], 'safe'],
            [['number_returns', 'unique_key'], 'string', 'max' => 255],
            [['number_returns'], 'unique'],
            [['unique_key'], 'unique'],
            ['condition_book_id', 'has_returns']
        ];
    }

    public function check_condition()
    {
        $ConditionBook = ConditionBook::find()->where(['id'=>$this->condition_book_id])->one();
        if(!$ConditionBook||!$ConditionBook->returnable){
            return false;
        }
        return true;
    }

    public static function getMainFields()
    {
        return [
            'id',
            'number_returns',
            'date_return',
        ];
    }

    protected function checkIssued()
    {
        $issued = IssuedOrder::find()->where(['order_id'=>$this->order_id])->all();
        if($issued && $this->will_return){
            foreach ($issued as $value){
                $value->delete();
            }
        }
    }

    public function has_returns()
    {
        $this->create_fk(ConditionBook::class, 'condition_book_id');
        $ConditionBook = ConditionBook::find()->where(['id'=>$this->condition_book_id])->one();
        if(!$ConditionBook||!$ConditionBook->returnable){
            $this->addError('condition_book_id', 'Товар не подлежит к возврату !!');
            return false;
        }
        return true;
    }
    public function beforeSave($insert)
    {
        if($insert){
            $this->number_returns = uniqid();
            $this->create_unique_key();
        }
        var_dump(123123231);
        $this->create_fk(Order::class, 'order_id');
        $this->create_fk(Worker::class, 'worker_id');
        $this->create_fk(ConditionBook::class, 'condition_book_id');
        if($this->will_return)$this->get_date('date_return');
        $this->checkIssued();
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
