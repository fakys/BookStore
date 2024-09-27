<?php
/**
 * @var \common\models\Worker $model
 */
?>

<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
<?=$form->field($model, 'name')->textInput()?>
<?=$form->field($model, 'surname')->textInput()?>
<?=$form->field($model, 'patronymic')->textInput()?>
<?=$form->field($model, 'email')->input('email')?>
<?=$form->field($model, 'passport_series')->textInput()?>
<?=$form->field($model, 'passport_number')->textInput()?>
<?=$form->field($model, 'position_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Position::find()->asArray()->all(), 'unique_key', 'name'))?>
<?=$form->field($model, 'password')->passwordInput()?>
<?=$form->field($model, 'password_confirm')->passwordInput()?>

<?=\backend\components\DropBoxComponent::widget(['model'=>$model, 'name'=>'avatar'])?>

<input type="submit" class="btn btn-success" value="Сохронить">
<?php \yii\widgets\ActiveForm::end()?>
