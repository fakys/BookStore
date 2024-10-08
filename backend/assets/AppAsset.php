<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin/adminlte.min.css',
        'css/admin/all.min.css',
        'css/admin/style.css'
    ];
    public $js = [
        'js/adminlte.js',
        'js/admin.js',
        'js/jq_main.js',
        'js/paginate.js',
        'js/drop_zone.js',
        'js/jq.knob.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];
}
