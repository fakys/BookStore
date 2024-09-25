<?php
use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 */
\backend\assets\AppAsset::register($this);

?>


<?php $this->beginPage()?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php $this->head()?>
        <title><?=$this->title?></title>
    </head>
    <body>
    <?php $this->beginBody()?>


    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="nav-link pushmenu" data-widget="pushmenu" role="button">
                        <i class="fas fa-bars"></i>
                    </div>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=Url::to(['/admin'])?>" class="nav-link">Главная</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Поиск" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-comments"></i>
                        <!--          !!!!-->
                        <span class="badge badge-danger navbar-badge">5</span>
                        <!--          !!!!-->
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <i class="far fa-bell"></i>
                        <!--          !!!!-->
                        <span class="badge badge-warning navbar-badge">15</span>
                        <!--          !!!!-->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" data-widget="fullscreen">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link" role="button">
                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!--  !!!!! user ava---->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="brand-link-container text-center">
                <a href="<?=Url::to(['/admin'])?>" class="brand-link">
                    <span class="brand-text font-weight-light">FNS</span>
                </a>
            </div>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"></a>
                    </div>
                </div>
                <div>
                    <div>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                                    <p>Language Menu</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?=$this->title?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="container">
                <?=$content?>
            </section>
        </div>
        <footer class="main-footer">
            <strong>FNS &copy; 2014-2024.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>



    <?php $this->endBody()?>
    </body>
    </html>
<?php $this->endPage()?>