<?php
/**
 * @var \common\models\Book $model
 */

$author = $model->getAuthor()->one();
$category = $model->getCategory()->one();
$photos = $model->getBooksPhotos()->all();
$orders = $model->getOrders()->all();
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
                    <div><?=$model->attributeLabels()['description']?></div>
                </div>
                <div class="card-body text-wrap">
                    <?=$model->description?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['price']?></div>
                </div>
                <div class="card-body text-wrap">
                    <?=$model->price?> ₽
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['remainder']?></div>
                </div>
                <div class="card-body text-wrap">
                    <?=$model->remainder?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['delivery_time_days']?></div>
                </div>
                <div class="card-body text-wrap">
                    <?=$model->delivery_time_days?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['article']?></div>
                </div>
                <div class="card-body text-wrap">
                    <?=$model->article?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['unique_key']?></div>
                </div>
                <div class="card-body text-wrap">
                    <?=$model->unique_key?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['category_id']?></div>
                </div>
                <div class="card-body">
                    <?php if($category):?>
                        <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$category->tableName(), 'key'=>$category->unique_key])?>"><?=$category->name?></a></div>
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['author_id']?></div>
                </div>
                <div class="card-body">
                    <?php if($category):?>
                        <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$author->tableName(), 'key'=>$author->unique_key])?>"><?=$author->name?></a></div>
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div>Заказы</div>
                </div>
                <div class="card-body">
                    <?php if($orders):?>
                        <?php foreach ($orders as $order):?>
                            <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$order->tableName(), 'key'=>$order->unique_key])?>"><?=$order->number?></a></div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div>Возвраты</div>
                </div>
                <div class="card-body">
                    <?php if($orders):?>
                        <?php foreach ($orders as $val):?>
                            <?php $return = $val->getBooksReturn()->one(); if($return  && $return->will_return):?>
                                <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$return->tableName(), 'key'=>$return->unique_key])?>"><?= $return->number_returns?></a></div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div>Проданные</div>
                </div>
                <div class="card-body">
                    <?php if($orders):?>
                        <?php foreach ($orders as $val):?>
                            <?php $ByBook = $val->getIssuedOrders()->one(); if($ByBook):?>
                                <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$ByBook->tableName(), 'key'=>$ByBook->unique_key])?>"><?= $ByBook->number?></a></div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>

        </div>
    </div>
</div>
