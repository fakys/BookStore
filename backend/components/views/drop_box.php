<?php
/**
 * @var \yii\db\ActiveRecord $model
 * @var string $name
 */

$class_name = explode('\\', get_class($model))[count(explode('\\', get_class($model)))-1];
?>

<div class="admin-form-photo-block">
    <div class="form-group d-flex gap-2">
        <div class="admin-drop-zone-container">
            <label><?=$model->attributeLabels()[$name]?></label>
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
        <input type="file" name="<?=$class_name."[$name]"?>" id="admin-photo-input" class="photo-input">
    </div>
</div>