<?php
/**
 * @var \common\models\ConditionBook $model
 */

$returns = $model->getBookReturns()->all()
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
                    <div class="text-wrap"><?=$model->attributeLabels()['description']?></div>
                </div>
                <div class="card-body">
                    <?=$model->description?>
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
                    <div>Возвраты</div>
                </div>
                <div class="card-body">
                    <?php if($returns):?>
                        <?php foreach ($returns as $return):?>
                            <div><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$return->tableName(), 'key'=>$return->unique_key])?>"><?=$return->number_returns?></a></div>
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
