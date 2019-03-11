<?php
namespace App\Common\Models\Exchange\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Rule extends Base
{

    /**
     * 兑换-规则
     * This model is mapped to the table exchange_rule
     */
    public function getSource()
    {
        return 'exchange_rule';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        $data['start_time'] = $this->changeToMongoDate($data['start_time']);
        $data['end_time'] = $this->changeToMongoDate($data['end_time']);
        return $data;
    }
}