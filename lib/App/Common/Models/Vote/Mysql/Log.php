<?php

namespace App\Common\Models\Vote\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Log extends Base
{

    /**
     * 投票-明细表管理
     * This model is mapped to the table vote_log
     */
    public function getSource()
    {
        return 'vote_log';
    }
    
    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        $data['vote_time'] = $this->changeToMongoDate($data['vote_time']);
        return $data;
    }
}