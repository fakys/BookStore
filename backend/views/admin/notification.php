<?php
/**
 * @var array $sent_orders
 * @var \common\models\Order $order
 * @var array $came_orders
 */


?>


    <div>
        <?php if($sent_orders):?>
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
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif;?>
        <?php if($came_orders):?>
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
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif;?>
    </div>

