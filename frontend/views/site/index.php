<?php
/**
 * @var array $books
 * @var \common\models\Book $var
 */
?>

<div class="container">
    <div class="index-page">
        <div class="main-content-index-page">
            <h3 class="title">Товары</h3>
            <div class="main-content-block">
                <?php foreach ($books as $val):?>
                <div class="product-block product-<?=$val['unique_key']?>">
                    <a href="<?=\yii\helpers\Url::to(['product/show/', 'id'=>$val['id']])?>" class="product-image-block">
                        <?php $photos= $val->getBooksPhotos()->asArray()->all(); if($photos):?>
                            <img src="<?=Yii::getAlias('@web').$photos[0]['photo']?>">
                        <?php else:?>
                            <img src="<?=Yii::getAlias('@web').'/image/user/default_user_ava.png'?>">
                        <?php endif;?>
                    </a>
                    <div class="text-center">
                        <div class="link-product name-products" data-key="<?=$val['unique_key']?>">
                            <?=$val['name']?>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="price-block-main-content">
                            <?=$val['price']?> ₽
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?=\yii\helpers\Url::to(['user/design-order', 'key'=>$val['unique_key']])?>" class="btn-main">Заказать</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>


            </div>
        </div>
    </div>
</div>