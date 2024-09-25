<?php

namespace backend\components;

use backend\components\behaviors\DataModelBehavior;
use yii\base\Widget;

class SidebarComponent extends Widget
{
    public function behaviors()
    {
        return [
            [
                'class'=>DataModelBehavior::class
            ]
        ];
    }

    public function run()
    {

        return $this->render('sidebar', ['models'=>$this->getAllModel()]);
    }
}