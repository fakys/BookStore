<?php
namespace backend\controllers;

use backend\components\behaviors\DataModelBehavior;
use common\models\IssuedOrder;
use yii\web\Controller;

class ProcessingOrdersController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class'=>DataModelBehavior::class
            ]
        ];
    }
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }


    public function actionSendOrders($table)
    {
        if($this->getModelByName($table) && \Yii::$app->request->isAjax){
            $model = $this->getModelByName($table)::find()->where(['unique_key'=>\Yii::$app->request->post('key')])->one();
            $model->sent = true;

            $model->save();
            return true;
        }
        \Yii::$app->response->setStatusCode(404);
    }

    public function actionIssuedOrders($table)
    {

        if($this->getModelByName($table) && \Yii::$app->request->isAjax){
            $order = $this->getModelByName($table)::find()->where(['unique_key'=>\Yii::$app->request->post('key')])->asArray()->one();
            if($order){
                $issued = new IssuedOrder();
                $issued->order_id = $order['id'];
                $issued->save();
                return true;
            }
        }
        \Yii::$app->response->setStatusCode(404);
    }

    public function actionReturnOrders($table)
    {
        if($this->getModelByName($table) && \Yii::$app->request->isAjax){
            $model = $this->getModelByName($table)::findOne(['unique_key'=>\Yii::$app->request->post('key')]);
            $model->will_return = true;
            $model->condition_book_id = \Yii::$app->request->post('condition');

            if ($model->save()){
                return true;
            }
            return false;
        }
        \Yii::$app->response->setStatusCode(404);
    }
    public function actionCameOrders($table)
    {
        if($this->getModelByName($table) && \Yii::$app->request->isAjax){
            $model = $this->getModelByName($table)::find()->where(['unique_key'=>\Yii::$app->request->post('key')])->one();
            $model->came = true;
            $model->save();
            return true;
        }
        \Yii::$app->response->setStatusCode(404);
    }
}