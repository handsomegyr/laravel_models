<?php

namespace App\Common\Models\Vote\Mysql;

use App\Common\Models\Base\Mysql\Base;

class RankPeriod extends Base
{

    /**
     * 投票-每期排行表管理
     * This model is mapped to the table vote_rank_period
     */
    public function getSource()
    {
        return 'vote_rank_period';
    }
}
