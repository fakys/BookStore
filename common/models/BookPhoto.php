<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;

/**
 * This is the model class for table "books_photos".
 *
 * @property int $id
 * @property string|null $photo
 * @property int|null $book_id
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Book $book
 */
class BookPhoto extends \yii\db\ActiveRecord
{
    use ModelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books_photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id'], 'default', 'value' => null],
            [['book_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['photo', 'unique_key'], 'string', 'max' => 255],
            [['unique_key'], 'unique'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
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
}
