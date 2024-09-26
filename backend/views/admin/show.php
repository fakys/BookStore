<?php
/**
 * @var \yii\db\ActiveRecord $model
 * @var array $data
 * @var string $search
 * @var string $field
 */
?>

<div class="admin-table-show-page">
    <div class="p-3"><a class="btn btn-success p-1" href="<?=\yii\helpers\Url::to(['admin/create', 'table'=>$model::tableName()])?>">Дбавить</a></div>
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
                        <div class="d-flex flex-column gap-1">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Поиск" value="<?=$search?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <select class="form-control-sm" name="field">
                                <?php if($field):?>
                                    <option value="" selected>Не выбранно</option>
                                <?php else:?>
                                    <option class="" value="">Не выбранно</option>
                                <?php endif;?>
                                <?php foreach ($model->attributeLabels() as $key=>$val):?>
                                    <?php if($field == $key):?>
                                        <option value="<?=$key?>" selected><?=\backend\helpers\Str::limit($val, 10)?></option>
                                    <?php else:?>
                                        <option value="<?=$key?>"><?=\backend\helpers\Str::limit($val, 10)?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
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
                    <th>Удалить</th>
                    <?php foreach ($model->attributes() as $val):?>
                        <?php if(isset($model->attributeLabels()[$val])):?>
                            <th><?=\backend\helpers\Str::limit($model->attributeLabels()[$val], 15)?></th>
                        <?php endif;?>
                    <?php endforeach;?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $key=>$val):?>
                    <tr  class="row-object">
                        <th>
                            <div><button type="button" class="btn btn-danger p-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Удалить</div></div>
                            <div class="delete-alert">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Вы уверены что хотите удплить этот элемент?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                                <a href="<?=\yii\helpers\Url::to(['admin/delete', 'table'=>$model::tableName(), 'key'=>$val['unique_key']])?>" type="button" class="btn btn-danger">Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </th>
                        <?php foreach ($val as $field=>$value):?>
                            <?php if(in_array($field, $model->getMainFields())):?>
                                <th><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$model::tableName(), 'key'=>$val['unique_key']])?>"> <?=\backend\helpers\Str::limit($value, 15)?></a></th>
                            <?php else:?>
                                <th><?=\backend\helpers\Str::limit($value, 15)?></th>
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
