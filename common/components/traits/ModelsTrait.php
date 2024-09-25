<?php
namespace common\components\traits;

trait ModelsTrait
{
    public function Search($search)
    {
        $fields = $this->getSearchFields();
        foreach ($fields as $val){
            $data = self::find()->asArray()->where(['like',$val , "%$search%", false])->all();
            if($data) return $data;
        }
       return [];
    }
}