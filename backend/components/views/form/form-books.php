<?php
/**
 * @var \common\models\Book $model
 */
?>

<?php $form  = \yii\widgets\ActiveForm::begin(['enableClientValidation' => false, 'options'=>['enctype'=>"multipart/form-data"]])?>
<?=$form->field($model, 'name')->textInput(['required'=>true])?>
<?=$form->field($model, 'description')->textarea()?>
<?=$form->field($model, 'price')->input('number', ['required'=>true])?>
<?=$form->field($model, 'remainder')->input('number')?>
<?=$form->field($model, 'delivery_time_days')->input('number')?>
<?=$form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Category::find()->asArray()->all(), 'unique_key', 'name'))?>
<?=$form->field($model, 'author_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Author::find()->asArray()->all(), 'unique_key', 'surname'))?>
<?=$form->field($model, 'photos[]')->fileInput(['class'=>'form-control', 'multiple'=>true])?>

<input type="submit" class="btn btn-success" value="Создать">
<?php \yii\widgets\ActiveForm::end()?>
