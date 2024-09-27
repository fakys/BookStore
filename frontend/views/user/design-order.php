<?php
/**
 * @var \common\models\Order $model
 */
?>

<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
<?=$form->field($model, 'count')->input('number')?>
<?=$form->field($model, 'worker_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Worker::find()->asArray()->all(), 'unique_key', 'surname'))?>
<input type="submit" class="btn btn-success m-3" value="Оформить">
<?php \yii\widgets\ActiveForm::end()?>
