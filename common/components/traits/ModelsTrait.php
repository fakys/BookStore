<?php
namespace common\components\traits;

use DateTime;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

trait ModelsTrait
{
    public const UPDATE = 'update';
    public const CREATE = 'create';
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

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

    public function upload_image($name, $dir)
    {
        $file = UploadedFile::getInstance($this, $name);

        if($file){
            $file_name = \Yii::$app->security->generateRandomString(20);
            $file_path = "storage/$dir/{$file_name}.{$file->getExtension()}";
            $file->saveAs("@frontend/web/$file_path");
            $this->$name= $file_path;
        }
    }

    public function upload_images($name, $dir, $model, $field_model, $fk)
    {
        $files = UploadedFile::getInstances($this, $name);
        if($files){
            foreach ($files as $file){
                $file_name = \Yii::$app->security->generateRandomString(20);
                $file_path = "storage/$dir/{$file_name}.{$file->getExtension()}";
                $file->saveAs("@frontend/web/$file_path");
                (new $model([$field_model=>$file_path, $fk=>$this->id]))->save();
            }
        }
    }

    public function create_unique_key()
    {
        $this->unique_key = \Yii::$app->security->generateRandomString();
    }

    public function hashPassword()
    {
        if($this->password){
            $this->password = \Yii::$app->security->generatePasswordHash($this->password);
        }
    }

    public function create_fk($model, $name)
    {
        $obj = $model::find()->asArray()->where(['unique_key'=>$this->$name])->one();
        if($obj){
            $this->$name = $obj['id'];
        }
    }

    protected function get_date($name)
    {
        $this->$name = (new DateTime())->format('Y-m-d H:i:s');
    }
}