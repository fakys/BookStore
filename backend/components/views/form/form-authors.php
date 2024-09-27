<?php
/**
 * @var \common\models\Author $model
 */
?>

<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
    <?=$form->field($model, 'name')->textInput(['required'=>true])?>
    <?=$form->field($model, 'surname')->textInput(['required'=>true])?>
    <?=$form->field($model, 'patronymic')?>
    <?=$form->field($model, 'email')->input('email', ['required'=>true])?>
    <?=\backend\components\DropBoxComponent::widget(['model'=>$model, 'name'=>'avatar']) ?>

<input type="submit" class="btn btn-success" value="Сохронить">
<?php \yii\widgets\ActiveForm::end()?>
