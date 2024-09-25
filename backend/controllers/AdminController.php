<?php
namespace backend\controllers;
use yii\web\Controller;

class AdminController extends Controller
{
    public $layout='base';
    public function actionIndex()
    {
        return $this->render('index');
    }
}