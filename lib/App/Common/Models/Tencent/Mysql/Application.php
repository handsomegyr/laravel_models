<?php
namespace App\Common\Models\Tencent\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Application extends Base
{

    /**
     * 腾讯-应用设置表管理
     * This model is mapped to the table tencent_application
     */
    public function getSource()
    {
        return 'tencent_application';
    }
}