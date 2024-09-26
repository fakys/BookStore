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
            [['description'], 'string'],
            [['price'], 'number'],
            [['remainder', 'delivery_time_days', 'category_id', 'author_id'], 'default', 'value' => null],
            [['remainder', 'delivery_time_days', 'category_id', 'author_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'article', 'unique_key'], 'string', 'max' => 255],
            [['article'], 'unique'],
            [['unique_key'], 'unique'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
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
}
