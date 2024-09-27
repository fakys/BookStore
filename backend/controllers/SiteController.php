<?php

namespace backend\controllers;

use common\models\Worker;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'main';


    public function actions()
    {
        if(!\Yii::$app->user->isGuest){
            $this->redirect(['admin/']);
        }
    }
    public function actionIndex()
    {
        $this->redirect(['admin/login']);
    }
    public function actionLogin()
    {
        $model = new Worker();
        if(\Yii::$app->request->post()){
            $model->load(\Yii::$app->request->post());
            if($model->login()){
                return $this->redirect(['admin/']);
            }
        }
        return $this->render('login', ['model'=>$model]);
    }
}
