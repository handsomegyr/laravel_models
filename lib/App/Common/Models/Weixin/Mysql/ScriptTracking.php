<?php
namespace App\Common\Models\Weixin\Mysql;

use App\Common\Models\Base\Mysql\Base;

class ScriptTracking extends Base
{

    /**
     * 微信执行时间跟踪统计
     * This model is mapped to the table weixin_script_tracking
     */
    public function getSource()
    {
        return 'weixin_script_tracking';
    }
}