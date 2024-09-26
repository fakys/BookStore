<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property float|null $price
 * @property int|null $remainder
 * @property int|null $delivery_time_days
 * @property string|null $article
 * @property int|null $category_id
 * @property int|null $author_id
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Author $author
 * @property BookPhoto[] $booksPhotos
 * @property Category $category
 * @property Order[] $orders
 */
class Book extends \yii\db\ActiveRecord
{
    use ModelsTrait;

    public $photos;
    public static function tableName()
    {
        return 'books';
    }

    public static function ruTableName()
    {
        return 'Книги';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['remainder', 'delivery_time_days', 'category_id', 'author_id'], 'default', 'value' => null],
            [['remainder', 'delivery_time_days'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'article', 'unique_key'], 'string', 'max' => 255],
            [['article'], 'unique'],
            [['unique_key'], 'unique']
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
        $this->upload_image('avatar', 'authors_image');
        $this->create_unique_key();
        $this->create_fk(Author::class, 'author_id');
        $this->create_fk(Category::class, 'category_id');
        $this->article = uniqid();
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->upload_images('photos', 'book_image', BookPhoto::class, 'photo', 'book_id');
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'remainder' => 'Остаток',
            'delivery_time_days' => 'Примерное время доставки',
            'article' => 'Артикул',
            'category_id' => 'Категория',
            'author_id' => 'Автор',
            'unique_key' => 'Уникальный ключ',
            'photos'=>'Фотокрафии',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[BooksPhotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooksPhotos()
    {
        return $this->hasMany(BookPhoto::class, ['book_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getOrders()
    {
        return $this->hasMany(Order::class, ['book_id' => 'id']);
    }


}
