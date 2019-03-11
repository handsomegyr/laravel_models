<?php
namespace App\Common\Models\Store\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Store extends Base
{

    /**
     * 门店-门店表管理
     * This model is mapped to the table store_store
     */
    public function getSource()
    {
        return 'store_store';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}