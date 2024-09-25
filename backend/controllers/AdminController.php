<?php
namespace backend\controllers;
use backend\components\behaviors\DataModelBehavior;
use common\models\Position;
use yii\web\Controller;

class AdminController extends Controller
{
    public $layout='base';

    public function behaviors()
    {
        return [
            [
                'class'=>DataModelBehavior::class
            ]
        ];
    }
    public function actionIndex()
    {
        return $this->render('index', ['models' => $this->getAllModel(), 'fields'=>$this->getMainFields()]);
    }

    public function actionShow($table)
    {
        $model = $this->getModelByName($table);
    }

}