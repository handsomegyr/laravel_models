<?php
namespace App\Common\Models\Base\Mysql\Laraval;

/**
 * 需要laraval支持
 */
use PDO;
use DB;
use App\Common\Models\Base\Mysql\Base;

class Impl1 extends Base
{

    /**
     * model
     *
     * @var \App\Common\Models\Base\Mysql\Base
     */
    protected $model = null;

    public function __construct(\App\Common\Models\Base\Mysql\Base $model)
    {
        if (empty($model)) {
            throw new \Exception('Model设置错误2');
        }
        $this->model = $model;
        $this->setPhql($this->model->getPhql());
        $this->setDebug($this->model->getDebug());
        $this->setDb($this->model->getDb());
        $this->setSource($this->model->getSource());
    }

    /**
     * 获取Model
     *
     * @var \App\Common\Models\Base\Mysql\Base
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * 数据字段整理
     */
    public function reorganize(array $data)
    {
        return $this->model->reorganize($data);
    }

    public function getDI()
    {
        $di = \Phalcon\DI::getDefault();
        return $di;
    }

    public function begin()
    {
        return $this->getDI()
            ->getDb()
            ->getConnection()
            ->beginTransaction();
    }

    public function commit()
    {
        return $this->getDI()
            ->getDb()
            ->getConnection()
            ->commit();
    }

    public function rollback()
    {
        return $this->getDI()
            ->getDb()
            ->getConnection()
            ->rollBack();
    }

    public function count(array $query)
    {
        $query = $this->appendSoftDeleteConditions($query);
        $sqlAndConditions = $this->getSqlAndConditions4Count($query);
        $phql = $sqlAndConditions['sql'];
        $conditions = $sqlAndConditions['conditions'];
        $result = $this->executeQuery($phql, $conditions['bind'], 'select');
        // $result = $result->fetch();
        if (! empty($result)) {
            $num = $result['num'];
        } else {
            $num = 0;
        }
        return $num;
    }

    public function findOne(array $query)
    {
        $query = $this->appendSoftDeleteConditions($query);
        $sqlAndConditions = $this->getSqlAndConditions4FindOne($query);
        $phql = $sqlAndConditions['sql'];
        $conditions = $sqlAndConditions['conditions'];
        $result = $this->executeQuery($phql, $conditions['bind'], 'selectOne');
        // $result = $result->fetch();
        if (! empty($result)) {
            return $this->reorganize($result);
        } else {
            return array();
        }
    }

    /**
     * 查询某个表中的数据
     *
     * @param array $query            
     * @param array $sort            
     * @param int $skip            
     * @param int $limit            
     * @param array $fields            
     */
    public function find(array $query, array $sort = null, $skip = 0, $limit = 10, array $fields = array())
    {
        $query = $this->appendSoftDeleteConditions($query);
        $total = $this->count($query);
        
        $sqlAndConditions = $this->getSqlAndConditions4Find($query, $sort, $skip, $limit, $fields);
        $phql = $sqlAndConditions['sql'];
        $conditions = $sqlAndConditions['conditions'];        
        $ret = $result = $this->executeQuery($phql, $conditions['bind'], 'select');
        // $ret = $result->fetchAll();
        $list = array();
        if (! empty($ret)) {
            foreach ($ret as $key => $item) {
                $list[$key] = $this->reorganize($item);
            }
        }
        
        return array(
            'total' => $total,
            'datas' => $list
        );
    }

    public function findAll(array $query, array $sort = null, array $fields = array())
    {
        $query = $this->appendSoftDeleteConditions($query);
        $sqlAndConditions = $this->getSqlAndConditions4FindAll($query, $sort, $fields);
        $phql = $sqlAndConditions['sql'];
        $conditions = $sqlAndConditions['conditions'];
        $ret = $result = $this->executeQuery($phql, $conditions['bind'], 'select');
        // $ret = $result->fetchAll();
        $list = array();
        if (! empty($ret)) {
            foreach ($ret as $key => $item) {
                $list[$key] = $this->reorganize($item);
            }
        }
        return $list;
    }

    public function sum(array $query, array $fields = array(), array $groups = array())
    {
        $query = $this->appendSoftDeleteConditions($query);
        $sqlAndConditions = $this->getSqlAndConditions4Sum($query, $fields, $groups);
        $phql = $sqlAndConditions['sql'];
        $conditions = $sqlAndConditions['conditions'];
        $ret = $result = $this->executeQuery($phql, $conditions['bind'], 'select');
        // $ret = $result->fetchAll();
        return $ret;
    }

    public function distinct($field, array $query)
    {
        $query = $this->appendSoftDeleteConditions($query);
        $sqlAndConditions = $this->getSqlAndConditions4Distinct($field, $query);
        $phql = $sqlAndConditions['sql'];
        $conditions = $sqlAndConditions['conditions'];
        $ret = $result = $this->executeQuery($phql, $conditions['bind'], 'select');
        // $ret = $result->fetchAll();
        $list = array();
        if (! empty($ret)) {
            foreach ($ret as $key => $item) {
                $data = $this->reorganize($item);
                $list[] = $data[$field];
            }
        }
        return $list;
    }

    /**
     * 执行insert操作
     *
     * @param array $datas            
     */
    public function insert(array $datas)
    {
        $sqlAndConditions = $this->getSqlAndConditions4Insert($datas);
        $phql = $sqlAndConditions['sql'];
        $insertFieldValues = $sqlAndConditions['insertFieldValues'];
        $data = $insertFieldValues['values'];
        $result = $this->executeQuery($phql, $data, 'insert');
        // $_id = $insertFieldValues['id'];
        $_id = $result['id'];
        return $this->findOne(array(
            'id' => $_id
        ));
    }

    public function update(array $criteria, array $object, array $options = array())
    {
        $criteria = $this->appendSoftDeleteConditions($criteria);
        $sqlAndConditions = $this->getSqlAndConditions4Update($criteria, $object, $options);
        $phql = $sqlAndConditions['sql'];
        $conditions = $sqlAndConditions['conditions'];
        $updateFieldValues = $sqlAndConditions['updateFieldValues'];
        $data = array_merge($updateFieldValues['values'], $conditions['bind']);
        $result = $this->executeQuery($phql, $data, 'update');
        return $result;
    }

    public function remove(array $query)
    {
        $options = array();
        $object = array(
            '$set' => array(
                'deleted_at' => getCurrentTime()
            )
        );
        return $this->update($query, $object, $options);
    }

    public function physicalRemove(array $query)
    {
        $sqlAndConditions = $this->getSqlAndConditions4Remove($query);
        $phql = $sqlAndConditions['sql'];
        $conditions = $sqlAndConditions['conditions'];
        $result = $this->executeQuery($phql, $conditions['bind'], 'delete');
        return $result;
    }

    /**
     * 执行save操作
     *
     * @param array $datas            
     */
    public function save(array $datas)
    {
        return $this->insert($datas);
    }

    /**
     * findAndModify
     */
    public function findAndModify(array $options)
    {
        $criteria = array();
        if (isset($options['query'])) {
            $criteria = $options['query'];
        }
        if (empty($criteria)) {
            throw new \Exception("query condition is empty in findAndModify", - 999);
        }
        $object = array();
        if (isset($options['update'])) {
            $object = $options['update'];
        }
        if (empty($object)) {
            throw new \Exception("update content is empty in findAndModify", - 999);
        }
        
        $new = false;
        if (isset($options['new'])) {
            $new = $options['new'];
        }
        $upsert = false;
        if (isset($options['upsert'])) {
            $upsert = $options['upsert'];
        }
        
        try {
            $this->begin();
            // 获取单条记录
            $info = $this->findOne($criteria);
            
            // 如果没有找到的话
            if (empty($info)) {
                // 如果需要插入的话
                if ($upsert) {
                    array_walk_recursive($criteria, function (&$value, $key) {
                        if (is_array($value)) {
                            unset($criteria[$key]);
                        }
                    });
                    $datas = array();
                    $datas = array_merge($criteria, $object['$set']);
                    $newInfo = $this->insert($datas);
                } else {
                    throw new \Exception("no record match query condition", - 999);
                }
            } else {
                // 进行更新操作
                $criteria['id'] = $info['id'];
                $this->update($criteria, $object);
                if ($new) {
                    // 获取单条记录
                    $newInfo = $this->findOne(array(
                        'id' => $info['id']
                    ));
                }
            }
            $this->commit();
            // 这里要确认一些mongodb的findAndModify操作的返回值
            
            $rst = array();
            $rst['ok'] = 1;
            if (empty($new)) {
                $rst['value'] = $info;
            } else {
                $rst['value'] = $newInfo;
            }
        } catch (\Exception $e) {
            $this->rollback();
            $rst = array();
            $rst['ok'] = 0;
            $rst['error'] = array(
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            );
        }
        return $rst;
    }

    protected function executeQuery($phql, array $data, $method = 'select')
    {
        try {
            $phql = preg_replace('/:(.*?):/i', ':$1', $phql);
            $phql = preg_replace('/\[(.*?)\]/i', '`$1`', $phql);
            if ($this->getDebug()) {
                echo "<pre><br/>";
                echo $phql . "<br/>";
                var_dump($data);
                die('OK');
            }
            
            $db = $this->getDI()->getDb();
            // var_dump($db);
            $db->setFetchMode(PDO::FETCH_ASSOC);
            //print_r($data);
            //die($phql);
            $result = $db->getConnection()->$method($phql, $data);
            // var_dump($result);
            // print_r($data);
            // die($phql);
            if ($method == "insert") {
                $result['id'] = $db->getConnection()
                    ->getPdo()
                    ->lastInsertId();
            }
            return $result;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    protected function appendSoftDeleteConditions($query)
    {
        $query['deleted_at'] = array(
            '$isnull' => true
        );
        return $query;
    }

    protected function setNewId($datas)
    {
        if (isset($datas['id'])) {
            unset($datas['id']);
        }
        return $datas;
    }
}
