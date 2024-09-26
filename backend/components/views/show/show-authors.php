<?php
/**
 * @var \common\models\Author $model
 */
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title m-0"><?=$model::rutableName()?></h3>
    </div>
    <div class="card-body">
        <div class="d-flex flex-column gap-3">

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['name']?></div>
                </div>
                <div class="card-body">
                    <?=$model->name?>
                </div>
            </div>
            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['surname']?></div>
                </div>
                <div class="card-body">
                    <?=$model->surname?>
                </div>
            </div>
            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['patronymic']?></div>
                </div>
                <div class="card-body">
                    <?=$model->patronymic?>
                </div>
            </div>
            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['email']?></div>
                </div>
                <div class="card-body">
                    <?=$model->email?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['avatar']?></div>
                </div>
                <div class="card-body">
                    <img src="<?=$model->avatar??Yii::getAlias('@default_user_ava')?>">
                </div>
            </div>

        </div>
    </div>
</div>
