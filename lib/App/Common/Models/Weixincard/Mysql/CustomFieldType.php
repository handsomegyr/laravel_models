<?php
namespace App\Common\Models\Weixincard\Mysql;

use App\Common\Models\Base\Mysql\Base;

class CustomFieldType extends Base
{

    /**
     * 微信卡券-会员信息卡类型
     * This model is mapped to the table weixincard_custom_field_type
     */
    public function getSource()
    {
        return 'weixincard_custom_field_type';
    }
}