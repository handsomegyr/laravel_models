<?php
namespace App\Common\Models\Weixinredpack\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Customer extends Base
{

    /**
     * 微信红包-客户信息
     * This model is mapped to the table weixinredpack_customer
     */
    public function getSource()
    {
        return 'weixinredpack_customer';
    }

    
}