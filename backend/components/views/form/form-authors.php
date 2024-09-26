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


<div class="admin-form-photo-block">
    <div class="form-group d-flex gap-2">
        <div class="admin-drop-zone-container">
            <label><?=$model->attributeLabels()['avatar']?></label>
            <label for="admin-photo-input" class="admin-drop-zone">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="" class="admin-drop-zone-image">
                </div>
                <div class="admin-drop-zone-content">
                    <i class="fa fa-download" aria-hidden="true"></i>
                    <div class="btn-main-r">
                        Загрузить изображение
                    </div>
                </div>
            </label>
            <div class="name-image-drop-zone"></div>
        </div>
        <div class="pt-5">
            <div class="btn-main-r admin-close-drop-zone">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <?=$form->field($model, 'avatar')->input('file', ['id'=>'admin-photo-input', 'class'=>'photo-input'])->label('')?>
    </div>
</div>



<input type="submit" class="btn btn-success" value="Создать">
<?php \yii\widgets\ActiveForm::end()?>
