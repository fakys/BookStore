<?php
/**
 * @var \yii\db\ActiveRecord $model
 * @var array $data
 */
?>

<div class="admin-table-show-page">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Таблица "<?=$model::ruTableName()?>"</h3>
            <div>
                <form method="get" class="d-flex " action="<?=\yii\helpers\Url::to(['admin/show', 'table'=>$model::tableName()])?>">
                    <div class="card-tools ml-auto d-flex gap-2">
                        <?php if($search):?>
                            <div>
                                <a href="<?=\yii\helpers\Url::to(['admin/show', 'table'=>$model::tableName()])?>" class="btn btn-danger p-0 pl-2 pr-2">Отмена</a>
                            </div>
                        <?php endif;?>
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="Поиск" value="<?=$search?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped admin-table-show">
                <thead>
                <tr>
                    <?php foreach ($model->attributeLabels() as $key=>$val):?>
                        <th><?=\backend\helpers\Str::limit($val, 15)?></th>
                    <?php endforeach;?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $key=>$val):?>
                    <tr  class="row-object">
                        <?php foreach ($val as $field=>$value):?>
                            <?php if(in_array($field, $model->getMainFields())):?>
                                <th><a href="#"> <?=\backend\helpers\Str::limit($value, 15)?></a></th>
                            <?php else:?>
                                <th><?=$value?></th>
                            <?php endif;?>
                        <?php endforeach;?>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <div class="p-2 d-flex">
                <ul class="pagination pagination-sm m-0 float-left">
                    <li class="page-item page-link pagination-prev">«</li>
                    <div class="pages-items">
                    </div>
                    <li class="page-item page-link pagination-next">»</li>
                </ul>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
