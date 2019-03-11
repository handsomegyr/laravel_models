<?php
namespace App\Common\Models\Task\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Log extends Base
{

    /**
     * 任务-日志管理
     * This model is mapped to the table task_log
     */
    public function getSource()
    {
        return 'task_log';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        $data['is_success'] = $this->changeToBoolean($data['is_success']);
        $data['log_time'] = $this->changeToMongoDate($data['log_time']);
        $data['request'] = $this->changeToArray($data['request']);
        $data['result'] = $this->changeToArray($data['result']);
        return $data;
    }
}