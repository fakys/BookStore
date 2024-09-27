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
            <div class="col-lg-1 text-center">
                <a href="<?=Url::to(['/'])?>" class="main-logo-header">
                    Books
                </a>
            </div>
            <div class="col-lg-2 mb-2">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn-catalog-header">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        Катeгории
                    </a>
                </div>

            </div>
            <div class="col-lg-6 mb-2">
                <form class="d-flex gap-2">
                    <input type="search" class="form-control search-input-header">
                    <div class="d-flex align-items-center">
                        <input type="submit" class="btn-search-header" value="Найти">
                    </div>

                </form>
            </div>
            <div class="col-lg-3 d-flex justify-content-center gap-3">
                <a href="<?=Url::to(['user/login'])?>" class="link-header">
                    Войти
                </a>
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
    <div class="title-footer">FNS</div>
    <div class="footer-main-footer">© 2002–2024 Компания FNS. Администрация Сайта не несет ответственности за размещаемые Пользователями материалы (в т.ч. информацию и изображения), их содержание и качество.</div>
</footer>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
