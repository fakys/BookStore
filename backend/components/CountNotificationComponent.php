<?php

namespace backend\components;

use backend\components\behaviors\DataModelBehavior;
use common\models\BookReturn;
use common\models\Order;
use yii\base\Widget;

class CountNotificationComponent extends Widget
{
    public function run()
    {
        $sent_orders = Order::find()->asArray()->Where(['sent'=>false])->all();
        $came_orders = Order::find()->asArray()->Where(['came'=>false])->all();
        $returns = BookReturn::find()->andWhere(['will_return'=>false])->all();
        $arr_returns = [];
        foreach ($returns as $val){
            if($val->check_condition()){
                $arr_returns[] =$val;
            }
        }
        return count(array_merge($sent_orders, $came_orders, $arr_returns));
    }
}