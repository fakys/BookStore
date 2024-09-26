<?php

namespace backend\components;

use yii\base\Widget;

class DropBoxComponent extends Widget
{
    public $model;
    public $name;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->model = $config['model'];
        $this->name = $config['name'];
    }

    public function run()
    {

        return $this->render('drop_box', ['model'=>$this->model, 'name'=>$this->name]);
    }
}