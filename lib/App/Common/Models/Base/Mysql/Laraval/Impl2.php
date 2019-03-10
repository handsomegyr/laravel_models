<?php
namespace App\Common\Models\Base\Mysql\Laraval;

use DB;

class Impl2 extends Impl1
{

    public function getDI()
    {
        return array();
    }

    protected function getDbConnection()
    {
        return DB::connection();
    }
}
