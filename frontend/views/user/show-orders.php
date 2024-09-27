<?php
/**
 * @var array $orders
 * @var \common\models\Order $order
 */
?>

<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Номер</th>
            <th scope="col">Книга</th>
            <th scope="col">Дата прихода</th>
            <th scope="col">Дата заказа</th>
            <th scope="col">Сотрудник</th>
            <th scope="col">Возврат</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order):?>
            <tr>
                <th scope="row"><?=$order->number?></th>
                <?php $book = $order->getBook()->one(); if($book):?>
                <td><?=$book->name?></td>
                <?php endif;?>
                <td><?=$order->arrival_date?></td>
                <td><?=$order->dispatch_date?></td>
                <?php $worker = $order->getWorker()->one(); if($worker):?>
                    <td><?=$worker->surname?></td>
                <?php endif;?>
                <td><a href="<?=\yii\helpers\Url::to(['user/return-books', 'number'=>$order->number])?>" class="btn btn-success p-1">Возврат</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
