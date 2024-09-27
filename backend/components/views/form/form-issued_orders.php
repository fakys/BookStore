<?php
/**
 * @var \common\models\IssuedOrder $model
 */
$order = \common\models\Order::find()->where(['sent'=>true])->all();
?>
<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
    <?=$form->field($model, 'order_id')->dropDownList(\yii\helpers\ArrayHelper::map($order, 'unique_key', 'number'))?>
    <input type="submit" class="btn btn-success" value="Создать">
<?php \yii\widgets\ActiveForm::end()?>