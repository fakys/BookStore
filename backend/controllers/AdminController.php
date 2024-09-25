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
        return $this->render('index', ['models' => $this->getAllModel()]);
    }

    public function actionShow($table)
    {
        if($this->getModelByName($table)){
            $model = new($this->getModelByName($table))();
            $search = \Yii::$app->request->get('search');
            if($search){
                $data = $model->Search($search);
            }else{
                $data = $model->find()->asArray()->all();
            }
            return $this->render('show', ['model'=>$model, 'data'=>$data, 'search'=>$search]);
        }else{
            $this->response->setStatusCode(404);
        }

    }

}