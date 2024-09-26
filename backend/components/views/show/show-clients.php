<?php
/**
 * @var \common\models\Client $model
 */


$order = $model->getOrders()->all();

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
                    <div><?=$model->attributeLabels()['passport_number']?></div>
                </div>
                <div class="card-body">
                    <?=$model->passport_number?>
                </div>
            </div>
            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['passport_series']?></div>
                </div>
                <div class="card-body">
                    <?=$model->passport_series?>
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
                    <div>Заказы</div>
                </div>
                <div class="card-body">
                    <?php if($order):?>
                        <?php foreach ($order as $val):?>
                            <?php if($val->sent):?>
                                <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$val->tableName(), 'key'=>$val->unique_key])?>"><?=$val->number?></a></div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div>Возвраты</div>
                </div>
                <div class="card-body">
                    <?php if($order):?>
                        <?php foreach ($order as $val):?>
                            <?php $return = $val->getBooksReturn()->one(); if($return && $return->will_return):?>
                                <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$return->tableName(), 'key'=>$return->unique_key])?>"><?=$return->number_returns?></a></div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div>Купленные книги</div>
                </div>
                <div class="card-body">
                    <?php if($order):?>
                        <?php foreach ($order as $val):?>
                            <?php $by_book = $val->getIssuedOrders()->one(); if($by_book):?>
                                <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$by_book->tableName(), 'key'=>$by_book->unique_key])?>"><?=$by_book->number?></a></div>
                            <?php endif;?>
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
