<?php

/**
 * @var \common\models\Client $user
 */
?>

<div class="page-profile">
    <div class="profile-block-container">
        <div class="title-profile-block">Профиль</div>
        <div class="body-profile-block">
            <div class="user-avatar-profile">
                <?php if($user->avatar):?>
                    <img src="<?=Yii::getAlias('@web')."/{$user->avatar}"?>">
                <?php else:?>
                    <img src="<?=Yii::getAlias('@web')."/image/user/default_user_ava.png"?>">
                <?php endif;?>
            </div>
            <div class="user-data-container">
                <div class="user-data">Логин: <?=$user->name?></div>
                <div class="user-data">Email: <?=$user->email?></div>
                <div class="mt-3">
                    <div class="btn btn-danger p-1 logout-profile-btn">
                        Выйти
                    </div>
                </div>
                <div class="links-body-profile">
                    <div><a href="<?=\yii\helpers\Url::to(['user/show-orders'])?>" class="btn-main">Заказы</a></div>
                    <div><a href="<?=\yii\helpers\Url::to(['user/show-return'])?>" class="btn-main">Возвраты</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="logout-menu-container">
        <div class="logout-menu">
            <div class="title-logout-menu">
                Вы уверены что хотите выйти?
            </div>
            <div class="body-logout-menu">
                <a href="<?=\yii\helpers\Url::to(['user/logout'])?>" class="btn btn-danger">Выйти</a>
                <div class="btn-main d-flex align-items-center">
                    Назад
                </div>
            </div>
        </div>
    </div>
</div>
