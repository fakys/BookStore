<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;

/**
 * This is the model class for table "conditions_books".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property bool|null $returnable
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property BookReturn[] $bookReturns
 */
class ConditionBook extends \yii\db\ActiveRecord
{
    use ModelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conditions_books';
    }

    public static function ruTableName()
    {
        return 'Состояние книг';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['description'], 'string'],
            [['returnable'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'unique_key'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['unique_key'], 'unique'],
        ];
    }

    public static function getMainFields()
    {
        return [
            'id',
            'name',
            'description',
        ];
    }

   public function beforeSave($insert)
   {
       if(!$this->returnable){
           $this->returnable = 0;
       }
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
            'name' => 'Название',
            'description' => 'Описание',
            'returnable' => 'Подлежит возврату',
            'unique_key' => 'Уникальный ключ',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
        ];
    }

    /**
     * Gets query for [[BookReturns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookReturns()
    {
        return $this->hasMany(BookReturn::class, ['condition_book_id' => 'id']);
    }
}
