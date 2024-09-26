<?php

namespace backend\components;

use backend\components\behaviors\DataModelBehavior;
use yii\base\Widget;

class ShowComponent extends Widget
{
    public function behaviors()
    {
        return [
            [
                'class'=>DataModelBehavior::class
            ]
        ];
    }

    public $model;

   public function __construct($data)
   {
       parent::__construct($data);
       $this->model = $data['model'];
   }

    public function run()
    {
        return $this->render("show/show-{$this->model::tableName()}", ['model'=>$this->model]);
    }
}