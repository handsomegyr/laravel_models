<?php
namespace App\Backend\Submodules\Live\Models;

class Room extends \App\Common\Models\Live\Room
{
    use \App\Backend\Models\Base;

    /**
     * 获取所有房间列表
     *
     * @return array
     */
    public function getAll()
    {
        $query = $this->getQuery();
        $sort = $this->getDefaultSort();
        $ret = $this->findAll($query, $sort);
        $list = array();
        foreach ($ret as $item) {
            $list[$item['id']] = $item['name'];
        }
        return $list;
    }
}