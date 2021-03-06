<?php
namespace App\Common\Models\Weixincard\Mysql;

use App\Common\Models\Base\Mysql\Base;

class DateInfoType extends Base
{

    /**
     * 微信卡券-使用时间的类型
     * This model is mapped to the table weixincard_date_info_type
     */
    public function getSource()
    {
        return 'weixincard_date_info_type';
    }
}