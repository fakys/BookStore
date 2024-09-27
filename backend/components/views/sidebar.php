<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?=\yii\helpers\Url::to(['admin/statistics'])?>" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Статистика</p>
        </a>
    </li>
    <?php foreach ($models as $val):?>
        <li class="nav-item">
            <a href="<?=\yii\helpers\Url::to(['admin/show', 'table'=>$val::tableName()])?>" class="nav-link">
                <i class="fa fa-table nav-icon" aria-hidden="true"></i>
                <p><?=$val::ruTableName()?></p>
            </a>
        </li>
    <?php endforeach;?>
</ul>