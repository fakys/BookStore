<?php
namespace backend\components\behaviors;
use common\models\Author;
use common\models\Book;
use common\models\BookReturn;
use common\models\Category;
use common\models\Client;
use common\models\ConditionBook;
use common\models\IssuedOrder;
use common\models\Order;
use common\models\Position;
use common\models\Worker;
use yii\base\Behavior;

class DataModelBehavior extends Behavior
{
    private $data_model = [
        Author::class,
        Book::class,
        Worker::class,
        Position::class,
        Order::class,
        Client::class,
        Category::class,
        ConditionBook::class,
        BookReturn::class,
        IssuedOrder::class
    ];
    public function getAllModel()
    {
        return $this->data_model;
    }
    public function getModelByName($table)
    {

        foreach ($this->data_model as $value){
            if($value::tableName() == $table){
                return $value;
            }
        }
        return '';
    }
}