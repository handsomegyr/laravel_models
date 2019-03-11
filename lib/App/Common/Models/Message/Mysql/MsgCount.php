<?php
namespace App\Common\Models\Message\Mysql;

use App\Common\Models\Base\Mysql\Base;

class MsgCount extends Base
{

    /**
     * 消息-消息数量管理
     * This model is mapped to the table message_msg_count
     */
    public function getSource()
    {
        return 'message_msg_count';
    }
}