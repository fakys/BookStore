<?php
/**
 * @var \common\models\Order $model
 */
$book = $model->getBook()->one();
$worker = $model->getWorker()->one();
$client = $model->getClient()->one();
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title m-0"><?=$model::rutableName()?></h3>
    </div>
    <div class="card-body">
        <div class="d-flex flex-column gap-3">

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['number']?></div>
                </div>
                <div class="card-body">
                    <?=$model->number?>
                </div>
            </div>
            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['count']?></div>
                </div>
                <div class="card-body">
                    <?=$model->count?>
                </div>
            </div>
            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['sent']?></div>
                </div>
                <div class="card-body">
                    <?php if($model->sent):?>
                        <div class="text-success">True</div>
                    <?php else:?>
                        <div class="text-danger">False</div>
                    <?php endif;?>
                </div>
            </div>
            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['came']?></div>
                </div>
                <div class="card-body">
                    <?php if($model->came):?>
                        <div class="text-success">True</div>
                    <?php else:?>
                        <div class="text-danger">False</div>
                    <?php endif;?>
                </div>
            </div>


            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['dispatch_date']?></div>
                </div>
                <div class="card-body">
                    <?=$model->dispatch_date?>
                </div>
            </div>
            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['arrival_date']?></div>
                </div>
                <div class="card-body">
                    <?=$model->arrival_date?>
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
                    <div><?=$model->attributeLabels()['book_id']?></div>
                </div>
                <div class="card-body">
                    <?php if($book):?>
                        <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$book->tableName(), 'key'=>$book->unique_key])?>"><?=$book->name?></a></div>
                    <?php endif;?>
                </div>
            </div>

            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['client_id']?></div>
                </div>
                <div class="card-body">
                    <?php if($client):?>
                        <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$client->tableName(), 'key'=>$client->unique_key])?>"><?=$client->surname?></a></div>
                    <?php endif;?>
                </div>
            </div>
            <div class="card w-50">
                <div class="card-header">
                    <div><?=$model->attributeLabels()['worker_id']?></div>
                </div>
                <div class="card-body">
                    <?php if($worker):?>
                        <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$worker->tableName(), 'key'=>$worker->unique_key])?>"><?=$worker->name?></a></div>
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
