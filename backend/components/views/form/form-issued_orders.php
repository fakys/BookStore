<?php
/**
 * @var \common\models\IssuedOrder $model
 */
?>
<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
    <?=$form->field($model, 'order_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Order::find()->asArray()->all(), 'unique_key', 'number'))?>
    <?=$form->field($model, 'date_issue')->input('date')?>
    <input type="submit" class="btn btn-success" value="Создать">
<?php \yii\widgets\ActiveForm::end()?>