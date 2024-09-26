<?php
/**
 * @var array $models
 * @var array $fields
 * @var \yii\db\ActiveRecord $model
 */
?>

<div class="d-flex flex-wrap justify-content-around gap-2">
    <?php foreach ($models as $model):?>
        <div class="card index-table">
            <div class="card-header">
                <h3 class="card-title"><a href="<?=\yii\helpers\Url::to(['admin/show', 'table'=>$model::tableName()])?>"><?=$model::ruTableName()?></a> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body index-table-body" >
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <?php foreach ((new $model())->attributeLabels() as $field=>$val):?>
                            <?php if(in_array($field, $model::getMainFields())):?>
                                <th><?=\backend\helpers\Str::limit($val, 10)?></th>
                            <?php endif;?>
                        <?php endforeach;?>
                    </tr>
                    </thead>
                    <tbody class="mini-table-body">
                    <tr>
                        <?php foreach ($model::find()->asArray()->all() as $data):?>
                            <?php foreach ($data as $key=>$val):?>
                                <?php if(in_array($key, $model::getMainFields())):?>
                                    <td><?=\backend\helpers\Str::limit($val, 10)?></td>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach;?>
</div>