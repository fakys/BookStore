<?php
/**
 * @var array $orders
 * @var \common\models\BookReturn $book_return
 */
?>

<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Номер</th>
            <th scope="col">Книга</th>
            <th scope="col">Дата возвоата</th>
            <th scope="col">Сотрудник</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order):?>
        <?php $val=$order->getBooksReturn()->one();?>
        <?php if($val):?>
            <tr>
                <th scope="row"><?=$val->number_returns?></th>
                <?php $book = $order->getBook()->asArray()->one(); if($book):?>
                <td><?=$book['name']?></td>
                <?php endif;?>
                <td><?=$val->date_return?></td>
                <?php if($worker = $val->getWorker()->asArray()->one()):?>
                    <td><?=$worker['surname']?></td>
                <?php endif;?>
            </tr>
        <?php endif;?>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
