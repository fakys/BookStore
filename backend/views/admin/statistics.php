<?php
/**
 * @var common\models\Client $model
 * @var \common\models\BookReturn $return
 */
?>


    <div class="d-flex flex-column justify-content-center gap-5">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="col-6 col-md-3 text-center ">
                <input type="text" class="knob" value="<?=$model->get_statistics()['percent_without_books']?>" data-width="200" data-height="200" data-fgColor="#3c8dbc"
                       data-readonly="true">
                <div class="knob-label p-1"></div>
            </div>
            <div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Клиенты без кни</h3>
                    </div>
                    <div class="card-body card-static p-0">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($model->get_statistics()['client_without_books'] as $val):?>
                                <tr>
                                    <td><?=$val['id']?></td>
                                    <td><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>\common\models\Client::tableName(), 'key'=>$val['unique_key']])?>"><?=$val['name']?></a></td>
                                    <td><?=$val['surname']?></td>
                                    <td>
                                        <?=$val['email']?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <div class="col-6 col-md-3 text-center">
                <input type="text" class="knob" value="<?=$model->get_statistics()['percent_with_books']?>" data-width="200" data-height="200" data-fgColor="#f56954"
                       data-readonly="true">
                <div class="knob-label">Клиенты с книгами</div>
            </div>
            <div class="card-body card-static p-0">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->get_statistics()['client_with_books'] as $val):?>
                        <tr>
                            <td><?=$val['id']?></td>
                            <td><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>\common\models\Client::tableName(), 'key'=>$val['unique_key']])?>"><?=$val['name']?></a></td>
                            <td><?=$val['surname']?></td>
                            <td>
                                <?=$val['email']?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <div class="col-6 col-md-3 text-center">
                <input type="text" class="knob" value="<?=$return->getStatistics()['percent_returns']?>" data-width="200" data-height="200" data-fgColor="#39CCCC"
                       data-readonly="true">
                <div class="knob-label">Процент возвратов</div>
            </div>
            <div class="card-body card-static p-0">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Уникальный ключ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($return->getStatistics()['returns'] as $val):?>
                        <tr>
                            <td><?=$val['id']?></td>
                            <td><a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>\common\models\BookReturn::tableName(), 'key'=>$val['unique_key']])?>"><?=$val['unique_key']?></a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




