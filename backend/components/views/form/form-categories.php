<?php
/**
 * @var \common\models\Category $model
 */
?>

<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
<?=$form->field($model, 'name')->textInput(['required'=>true])?>

<input type="submit" class="btn btn-success" value="Создать">
<?php \yii\widgets\ActiveForm::end()?>
