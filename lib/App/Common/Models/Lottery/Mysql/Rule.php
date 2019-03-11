<?php
namespace App\Common\Models\Lottery\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Rule extends Base
{

    /**
     * 抽奖概率管理
     * This model is mapped to the table lottery_rule
     */
    public function getSource()
    {
        return 'lottery_rule';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        $data['allow_start_time'] = $this->changeToMongoDate($data['allow_start_time']);
        $data['allow_end_time'] = $this->changeToMongoDate($data['allow_end_time']);
        return $data;
    }
}