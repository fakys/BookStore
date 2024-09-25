<?php

namespace common\models;

use common\components\traits\ModelsTrait;
use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $unique_key
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Worker[] $workers
 */
class Position extends \yii\db\ActiveRecord
{
    use ModelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'positions';
    }

    public static function ruTableName()
    {
        return 'Должности';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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

    public function getSearchFields()
    {
        return [
            'name',
            'unique_key',
        ];
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
     * Gets query for [[Workers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Worker::class, ['position_id' => 'id']);
    }
}
