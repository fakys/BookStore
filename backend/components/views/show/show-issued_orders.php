<?php
/**
 * @var \common\models\IssuedOrder $model
 */

$order = $model->getOrder()->one();

$client = $order->getClient()->one();
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title m-0"><?=$model::rutableName()?></h3>
    </div>
    <div class="card-body">
        <div class="d-flex flex-column gap-3">

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['date_issue']?></div>
                </div>
                <div class="card-body">
                    <?=$model->date_issue?>
                </div>
            </div>


            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['order_id']?></div>
                </div>
                <div class="card-body">
                    <?php if($order):?>
                        <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$order->tableName(), 'key'=>$order->unique_key])?>"><?=$order->number?></a></div>
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div>Клиент</div>
                </div>
                <div class="card-body">
                    <?php if($client):?>
                        <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$client->tableName(), 'key'=>$client->unique_key])?>"><?=$client->surname?></a></div>
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
