<?php
namespace App\Common\Models\Lottery\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Record extends Base
{

    /**
     * 抽奖原始记录
     * This model is mapped to the table lottery_record
     */
    public function getSource()
    {
        return 'lottery_record';
    }
}