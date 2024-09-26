<?php
/**
 * @var \common\models\Worker $model
 */
?>

<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
<?=$form->field($model, 'name')->textInput(['required'=>true])?>
<?=$form->field($model, 'surname')->textInput(['required'=>true])?>
<?=$form->field($model, 'patronymic')->textInput(['required'=>true])?>
<?=$form->field($model, 'email')->input('email', ['required'=>true])?>
<?=$form->field($model, 'passport_series')->textInput(['required'=>true])?>
<?=$form->field($model, 'passport_number')->textInput(['required'=>true])?>
<?=$form->field($model, 'position_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Position::find()->asArray()->all(), 'unique_key', 'name'))?>
<?=$form->field($model, 'password')->passwordInput(['required'=>true])?>
<?=$form->field($model, 'password_confirm')->passwordInput(['required'=>true])?>

<?=\backend\components\DropBoxComponent::widget(['model'=>$model, 'name'=>'avatar'])?>

<input type="submit" class="btn btn-success" value="Создать">
<?php \yii\widgets\ActiveForm::end()?>
