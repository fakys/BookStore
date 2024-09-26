<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Book[] $books
 */
class Category extends \yii\db\ActiveRecord
{
    use ModelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    public static function ruTableName()
    {
        return 'Категории';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name','required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'unique_key'], 'string', 'max' => 255],
            [['unique_key'], 'unique'],
        ];
    }

    public static function getMainFields()
    {
        return [
            'id',
            'name',
            'unique_key',
        ];
    }
    public function beforeSave($insert)
    {
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
            'unique_key' => 'Уникальный ключ',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::class, ['category_id' => 'id']);
    }
}
