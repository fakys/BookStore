<?php
/**
 * @var array $sent_orders
 * @var \common\models\Order $order
 * @var array $return
 * @var array $came_orders
 */


?>


    <div>

            <div class="card bg-dark sent_orders">
                <div class="card-header">
                    <h3 class="card-title">Отправить заказы</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Номер заказа</th>
                            <th>Клиент</th>
                            <th>Работник</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($sent_orders):?>
                            <?php foreach ($sent_orders as $order):?>
                                <?php
                            $order_client = $order->getClient()->one();
                            $order_worker = $order->getWorker()->one()
                            ?>
                            <tr class="sent-tr-<?=$order->unique_key?> sent-tr">
                                <td>
                                    <a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$order->tableName(), 'key'=>$order->unique_key])?>">
                                        <?=$order->number?>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$order_client->tableName(), 'key'=>$order_client->unique_key])?>"><?=$order_client->surname?></a>
                                </td>
                                <td>
                                    <a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$order_worker->tableName(), 'key'=>$order_worker->unique_key])?>"><?=$order_worker->surname?></a>
                                </td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm" data-url="<?=\yii\helpers\Url::to(['admin/send-orders', 'table'=>$order->tableName()])?>" data-key="<?=$order->unique_key?>">
                                        <div class="btn btn-success add-order"><i class="fa fa-check" aria-hidden="true"></i></div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card bg-dark came_orders">
                <div class="card-header">
                    <h3 class="card-title">Принять заказы</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Номер заказа</th>
                            <th>Клиент</th>
                            <th>Работник</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($came_orders):?>
                        <?php foreach ($came_orders as $order):?>
                            <?php
                        $order_client = $order->getClient()->one();
                        $order_worker = $order->getWorker()->one()
                        ?>
                        <tr class="came-tr-<?=$order->unique_key?> came-tr">
                            <td>
                                <a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$order->tableName(), 'key'=>$order->unique_key])?>">
                                    <?=$order->number?>
                                </a>
                            </td>
                            <td>
                                <a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$order_client->tableName(), 'key'=>$order_client->unique_key])?>"><?=$order_client->surname?></a>
                            </td>
                            <td>
                                <a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$order_worker->tableName(), 'key'=>$order_worker->unique_key])?>"><?=$order_worker->surname?></a>
                            </td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm" data-url="<?=\yii\helpers\Url::to(['admin/came-orders', 'table'=>$order->tableName()])?>" data-key="<?=$order->unique_key?>">
                                    <div class="btn btn-success came-order"><i class="fa fa-check" aria-hidden="true"></i></div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>



            <div class="card bg-dark return_orders">
                <div class="card-header">
                    <h3 class="card-title">Принять возвраты</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Номер заказа</th>
                            <th>Номер возврата</th>
                            <th>Работник</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($return as $val):?>
                            <?php if($val->check_condition()):?>
                                <?php
                                $return_client = $val->getOrder()->one();
                                $return_worker = $val->getWorker()->one();
                                ?>
                                <tr class="return-tr-<?=$val->unique_key?> return-tr">
                                    <td>
                                        <a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$val->tableName(), 'key'=>$val->unique_key])?>">
                                            <?=$val->number_returns?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$return_client->tableName(), 'key'=>$return_client->unique_key])?>"><?=$return_client->number?></a>
                                    </td>
                                    <td>
                                        <a href="<?=\yii\helpers\Url::to(['admin/show-table', 'table'=>$return_worker->tableName(), 'key'=>$return_worker->unique_key])?>"><?=$return_worker->surname?></a>
                                    </td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm" data-url="<?=\yii\helpers\Url::to(['admin/return-orders', 'table'=>$val->tableName()])?>" data-key="<?=$val->unique_key?>">
                                            <div class="btn btn-success return-order"><i class="fa fa-check" aria-hidden="true"></i></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif;?>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

