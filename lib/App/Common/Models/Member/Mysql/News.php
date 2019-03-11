<?php
namespace App\Common\Models\Member\Mysql;

use App\Common\Models\Base\Mysql\Base;

class News extends Base
{

    /**
     * 会员-动态管理
     * This model is mapped to the table member_news
     */
    public function getSource()
    {
        return 'member_news';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        $data['news_time'] = $this->changeToMongoDate($data['news_time']);
        return $data;
    }
}