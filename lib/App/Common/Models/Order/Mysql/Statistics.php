<?php
namespace App\Common\Models\Order\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Statistics extends Base
{

    /**
     * 订单-统计管理
     * This model is mapped to the table order_statistics
     */
    public function getSource()
    {
        return 'order_statistics';
    }
}