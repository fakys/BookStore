<?php

use yii\helpers\Url;

\frontend\assets\AppAsset::register($this);

$this->beginPage();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if($this->title):?>
        <title><?=$this->title?></title>
    <?php endif;?>
    <?=\yii\helpers\Html::csrfMetaTags()?>
    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>
<header class="p-1 fixed-top bg-white w-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-center">
                <a href="<?=Url::to(['/'])?>" class="main-logo-header">
                    Books store
                </a>
            </div>
            <div class="col-lg-6 mb-2">
                <form class="d-flex gap-2">
                    <input type="text" class="form-control search-input-header">
                </form>
            </div>
            <div class="col-lg-3 d-flex justify-content-center gap-3">
                <?php if(Yii::$app->user->isGuest):?>
                <a href="<?=Url::to(['user/login'])?>" class="link-header">
                    Войти
                </a>
                <?php else:?>
                    <a href="<?=Url::to(['user/profile'])?>" class="link-header">
                        Профиль
                    </a>
                <?php endif;?>
            </div>
        </div>
    </div>
</header>
<div class="main-content container">
    <?php if($this->title):?>
        <h1 class="h1"><?=$this->title?></h1>
    <?php endif;?>

    <?=$content?>
</div>
<footer class="main-footer">
    <div class="title-footer">Books store</div>
    <div class="footer-main-footer">© 2002–2024 Компания Books store. Администрация Сайта не несет ответственности за размещаемые Пользователями материалы (в т.ч. информацию и изображения), их содержание и качество.</div>
</footer>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
