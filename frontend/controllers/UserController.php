<?php
namespace frontend\controllers;

use common\models\Book;
use common\models\BookReturn;
use common\models\Client;
use common\models\Order;
use common\models\Worker;
use yii\web\Controller;

class UserController extends Controller
{
    public function beforeAction($action)
    {

        if($action->id=='profile' && \Yii::$app->user->isGuest)$this->redirect(['user/login']);

        if($action->id=='login'||$action->id=='register' && !\Yii::$app->user->isGuest)$this->redirect(['user/profile']);
        return parent::beforeAction($action);
    }
    public function actionLogin()
    {
        $model = new Client();
        if(\Yii::$app->request->post()){
            $model->load(\Yii::$app->request->post());
            if($model->login()){
                return $this->redirect(['user/profile']);
            }
        }
        return $this->render('login', ['model'=>$model]);
    }

    public function actionRegister()
    {
        $model = new Client();
        if(\Yii::$app->request->post()){
            $model->load(\Yii::$app->request->post());
            if($model->save() && $model->login()){
                return $this->redirect(['user/profile']);
            }
        }
        return $this->render('register', ['model'=>$model]);
    }

    public function actionProfile()
    {
        return $this->render('profile', ['user'=>\Yii::$app->user->identity]);
    }

    public function actionDesignOrder($key)
    {
        $model = new Order ();
        if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post())){
            $book = Book::findOne(['unique_key'=>$key]);
            if($book){
                $model->book_id = $book->id;
                $model->client_id = \Yii::$app->user->identity->id;
                if($model->save()){
                    return  $this->redirect(['user/profile']);
                }
            }
        }
        return $this->render('design-order', ['model'=>$model]);
    }

    public function actionShowOrders()
    {
        $orders = \Yii::$app->user->identity->getOrders()->all();

        return $this->render('show-orders', ['orders'=>$orders]);
    }

    public function actionReturnBooks($number)
    {
        $model =new BookReturn();
        $order = Order::findOne(['number'=>$number]);
        if($order){
            if(\Yii::$app->request->isPost){
                $model->load(\Yii::$app->request->post());
                $model->order_id=$order->id;
                if($model->save()){
                    $this->redirect(['profile']);
                }
            }
        }else{
            \Yii::$app->response->setStatusCode(404);
        }
        return $this->render('return-books', ['model'=>$model]);
    }

    public function actionShowReturn()
    {
        $orders = \Yii::$app->user->identity->getOrders()->all();
        return $this->render('show-return-books', ['orders'=>$orders]);
    }

}