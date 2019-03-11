<?php
namespace App\Common\Models\Weixincard\Mysql;

use App\Common\Models\Base\Mysql\Base;

class CodeType extends Base
{

    /**
     * 微信卡券-code码展示类型
     * This model is mapped to the table weixincard_code_type
     */
    public function getSource()
    {
        return 'weixincard_code_type';
    }
}