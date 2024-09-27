<?php
namespace backend\controllers;
use backend\components\behaviors\DataModelBehavior;
use common\models\BookReturn;
use common\models\Client;
use common\models\IssuedOrder;
use common\models\Order;
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
    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest)
            return  $this->redirect(['site/login']);
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
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
            $field = \Yii::$app->request->get('field');
            if($search){
                $data = $model->Search($search, $field);
            }else{
                $data = $model->find()->asArray()->all();
            }
            return $this->render('show', ['model'=>$model, 'data'=>$data, 'search'=>$search, 'field'=>$field]);
        }else{
            $this->response->setStatusCode(404);
        }
    }

    public function actionCreate($table)
    {
        if($this->getModelByName($table)){
            $model = new ($this->getModelByName($table))();
            if(\Yii::$app->request->isPost){
                $model->load(\Yii::$app->request->post());
                if($model->save()){
                    return $this->redirect(['admin/show', 'table'=>$model->tableName()]);
                }
            }
            return $this->render('create', ['model'=>$model]);
        }else{
            \Yii::$app->response->setStatusCode(404);
        }
    }

    public function actionDelete($table, $key)
    {
        if($this->getModelByName($table)){
            $model = $this->getModelByName($table)::find()->where(['unique_key'=>$key])->one();
            if($model){
                $model->delete();
                $this->redirect(['admin/show', 'table'=>$table]);
            }
        }else{
            \Yii::$app->response->setStatusCode(404);
        }
    }

    public function actionShowTable($table, $key)
    {
        if($this->getModelByName($table)){
            $model = $this->getModelByName($table)::find()->where(['unique_key'=>$key])->one();
            if($model){
                return $this->render('show_table', ['model'=>$model]);
            }
        }
        \Yii::$app->response->setStatusCode(404);
    }

    public function actionNotification()
    {
        $sent_orders = Order::find()->andWhere(['sent'=>false])->all();
        $came_orders = Order::find()->andWhere(['came'=>false])->all();
        $return = BookReturn::find()->andWhere(['will_return'=>false])->all();


        return $this->render('notification', ['sent_orders'=>$sent_orders, 'came_orders'=>$came_orders, 'return'=>$return]);
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

    public function actionReturnOrders($table)
    {
        if($this->getModelByName($table) && \Yii::$app->request->isAjax){
            $model = $this->getModelByName($table)::find()->where(['unique_key'=>\Yii::$app->request->post('key')])->one();
            $model->will_return = true;
            $model->save();
            return true;
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

    public function actionStatistics()
    {
        $clients = Client::find()->all();
        $orders = Order::find()->andWhere(['and', ['sent'=>true], ['came'=>true]])->asArray()->all();
        $return_books = BookReturn::find()->all();
        return $this->render('statistics', ['clients'=>$clients, 'orders'=>$orders, 'return_books'=>$return_books]);
    }
    public function actionLogout()
    {
        if(\Yii::$app->user->logout())$this->redirect(['site/login']);
    }
}