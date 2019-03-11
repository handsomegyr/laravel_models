<?php
namespace App\Common\Models\Tencent\Mysql;

use App\Common\Models\Base\Mysql\Base;

class AppKey extends Base
{

    /**
     * 腾讯-应用密码表管理
     * This model is mapped to the table tencent_appkey
     */
    public function getSource()
    {
        return 'tencent_appkey';
    }
}