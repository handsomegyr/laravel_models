<?php
namespace App\Common\Models\Cronjob\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Log extends Base
{

    /**
     * 计划任务执行日志管理
     * This model is mapped to the table cronjob_log
     */
    public function getSource()
    {
        return 'cronjob_log';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}