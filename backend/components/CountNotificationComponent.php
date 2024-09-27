<?php

namespace backend\components;

use backend\components\behaviors\DataModelBehavior;
use common\models\Order;
use yii\base\Widget;

class CountNotificationComponent extends Widget
{
    public function run()
    {
        $sent_orders = Order::find()->asArray()->Where(['sent'=>false])->all();
        $came_orders = Order::find()->asArray()->Where(['came'=>false])->all();
        return count(array_merge($sent_orders, $came_orders));
    }
}