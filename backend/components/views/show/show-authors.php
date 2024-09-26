<?php
/**
 * @var \common\models\Author $model
 */

 $books = $model->getBooks()->all();
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
                    <?php if ($model->avatar):?>
                        <img src="<?=Yii::getAlias('@FrontendWeb')."/".$model->avatar?>" class="image-show-table">
                    <?php else:?>
                        <img src="<?=Yii::getAlias('@FrontendWeb')."/".Yii::getAlias('@default_user_ava')?>" class="image-show-table">
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['unique_key']?></div>
                </div>
                <div class="card-body">
                    <?=$model->unique_key?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div>Книги</div>
                </div>
                <div class="card-body">
                    <?php if($books):?>
                        <?php foreach ($books as $book):?>
                            <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$book->tableName(), 'key'=>$book->unique_key])?>"><?=$book->name?></a></div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['created_at']?></div>
                </div>
                <div class="card-body">
                    <?=$model->created_at?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['updated_at']?></div>
                </div>
                <div class="card-body">
                    <?=$model->updated_at?>
                </div>
            </div>



        </div>
    </div>
</div>
