<?php

namespace backend\components;

use backend\components\behaviors\DataModelBehavior;
use yii\base\Widget;

class CreateComponent extends Widget
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
        return $this->render("form/form-{$this->model::tableName()}", ['model'=>$this->model]);
    }
}