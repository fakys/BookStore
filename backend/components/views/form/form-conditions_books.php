<?php
/**
 * @var \common\models\ConditionBook $model
 */
?>

<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
<?=$form->field($model, 'name')->textInput(['required'=>true])?>
<?=$form->field($model, 'description')->textarea()?>
<?=$form->field($model, 'returnable')->checkbox()?>

<input type="submit" class="btn btn-success" value="Сохронить">
<?php \yii\widgets\ActiveForm::end()?>
