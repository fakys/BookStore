<?php
namespace common\components\traits;

use yii\helpers\ArrayHelper;

trait ModelsTrait
{
    public function Search($search, $field)
    {
       $data = self::find()->asArray()->all();
       $arr_search = [];
       if($field){
           foreach ($data as $val){
               if(isset($val[$field]) && strripos($val[$field], $search) !== false){
                   $arr_search[] = $val;
               }
           }
       }else{
           foreach (self::getMainFields() as $field){
               foreach ($data as $val){
                   if(isset($val[$field]) && strripos($val[$field], $search) !== false && !in_array($val['id'], ArrayHelper::getColumn($arr_search, 'id'))){
                       $arr_search[] = $val;
                   }
               }
           }
       }

       return $arr_search;
    }
}