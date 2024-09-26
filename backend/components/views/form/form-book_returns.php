<?php
/**
 * @var \common\models\BookReturn $model
 */
?>
<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
<?=$form->field($model, 'order_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Order::find()->asArray()->all(), 'unique_key', 'number'))?>
<?=$form->field($model, 'worker_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Worker::find()->asArray()->all(), 'unique_key', 'surname'))?>
<?=$form->field($model, 'condition_book_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\ConditionBook::find()->asArray()->all(), 'unique_key', 'name'))?>

<?=$form->field($model, 'will_return')->checkbox()?>
<?=$form->field($model, 'date_return')->input('date')?>
<input type="submit" class="btn btn-success" value="Создать">
<?php \yii\widgets\ActiveForm::end()?>
