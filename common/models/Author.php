<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string|null $email
 * @property string|null $avatar
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    use ModelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    public static function ruTableName()
    {
        return 'Авторы';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['surname', 'patronymic', 'email', 'avatar', 'unique_key'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['unique_key'], 'unique'],
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
            'email' => 'Email',
            'avatar' => 'Фотография',
            'unique_key' => 'Уникальный ключ',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
        ];
    }

    public function beforeSave($insert)
    {
        if($insert){
            $this->create_unique_key();
        }
        $this->upload_image('avatar', 'authors_image');
        return parent::beforeSave($insert);
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::class, ['author_id' => 'id']);
    }
}
