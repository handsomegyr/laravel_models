<?php
namespace App\Common\Models\Message\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Template extends Base
{

    /**
     * 消息-模版设置表管理
     * This model is mapped to the table message_template
     */
    public function getSource()
    {
        return 'message_template';
    }
}