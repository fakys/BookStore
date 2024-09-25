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
                <h3 class="card-title"><?=$model::ruTableName()?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <?php foreach ($fields[$model::tableName()] as $field):?>
                            <th><?=$field?></th>
                        <?php endforeach;?>
                    </tr>
                    </thead>
                    <tbody class="mini-table-body">
                    <tr>
                        <?php foreach ($model::find()->asArray()->all() as $data):?>
                            <?php foreach ($data as $key=>$val):?>
                                <?php if(isset($fields[$model::tableName()][$key])):?>
                                    <td><?=$val?></td>
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