<?php
/**
 * @var \common\models\Order $model
 */
?>

<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
    <?=$form->field($model, 'book_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Book::find()->asArray()->all(), 'unique_key', 'name'))?>
    <?=$form->field($model, 'count')->textInput(['required'=>true])?>
    <?=$form->field($model, 'client_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Client::find()->asArray()->all(), 'unique_key', 'surname'))?>
    <?=$form->field($model, 'worker_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Worker::find()->asArray()->all(), 'unique_key', 'surname'))?>
    <?=$form->field($model, 'sent')->checkbox()?>
    <?=$form->field($model, 'dispatch_date')->input('date')?>
    <?=$form->field($model, 'arrival_date')->input('date')?>
<input type="submit" class="btn btn-success" value="Сохронить">
<?php \yii\widgets\ActiveForm::end()?>
