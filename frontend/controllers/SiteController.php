<?php

namespace frontend\controllers;

use common\models\Book;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        $books = Book::find()->all();
        return $this->render('index', ['books'=>$books]);
    }
}
