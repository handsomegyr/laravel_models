<?php
namespace App\Common\Models\Base\Mysql;

class Base implements \App\Common\Models\Base\IBase
{

    protected $isDebug = false;

    protected $isPhql = false;

    protected $name = null;

    protected $dbName = 'db';

    protected $secondary = false;
    
    use BaseTrait;

    private $impl = NULL;

    public function __construct()
    {
        if (defined('LAVAREL_MODEL_DB_IMPLEMENT')) {
            if (LAVAREL_MODEL_DB_IMPLEMENT == "PHALCON") {
                $this->impl = new \App\Common\Models\Base\Mysql\Phalcon\Impl2($this);
            } elseif (LAVAREL_MODEL_DB_IMPLEMENT == "PHALCON_PDO") {
                $this->impl = new \App\Common\Models\Base\Mysql\Pdo\Impl($this);
            } elseif (LAVAREL_MODEL_DB_IMPLEMENT == "PHALCON_LAVAREL") {
                $this->impl = new \App\Common\Models\Base\Mysql\Laraval\Impl1($this);
            } elseif (LAVAREL_MODEL_DB_IMPLEMENT == "LAVAREL") {
                $this->impl = new \App\Common\Models\Base\Mysql\Laraval\Impl2($this);
            } else {
                throw new \Exception("{LAVAREL_MODEL_DB_IMPLEMENT}定义的数据库连接实现未找到");
            }
        } else {
            throw new \Exception("未定义数据库连接实现");
        }
    }

    public function setPhql($isPhql)
    {
        $this->isPhql = $isPhql;
    }

    public function getPhql()
    {
        return $this->isPhql;
    }

    public function setDebug($isDebug)
    {
        $this->isDebug = $isDebug;
    }

    public function getDebug()
    {
        return $this->isDebug;
    }

    public function setSource($source)
    {
        $this->name = $source;
    }

    public function getSource()
    {
        return $this->name;
    }
    
    // 数据库表前缀
    public function getPrefix()
    {
        $descriptor = $this->getDI()
            ->getDb()
            ->getDescriptor();
        if (! empty($descriptor['prefix'])) {
            return $descriptor['prefix'];
        } else {
            return "";
        }
    }

    public function setDb($db)
    {
        $this->dbName = $db;
    }

    public function getDb()
    {
        return $this->dbName;
    }

    public function setSecondary($secondary)
    {
        $this->secondary = $secondary;
    }

    public function getSecondary()
    {
        return $this->secondary;
    }

    public function reorganize(array $data)
    {
        if (isset($data['id'])) {
            $data['id'] = $this->getMongoId4Query($data['id']);
        }
        if (isset($data['created_at'])) {
            $data['created_at'] = $this->changeToMongoDate($data['created_at']);
        }
        if (isset($data['updated_at'])) {
            $data['updated_at'] = $this->changeToMongoDate($data['updated_at']);
        }
        if (isset($data['deleted_at'])) {
            $data['deleted_at'] = $this->changeToMongoDate($data['deleted_at']);
        }
        if (isset($data['memo'])) {
            $data['memo'] = $this->changeToArray($data['memo']);
        }
        return $data;
    }

    public function getDI()
    {
        return $this->impl->getDI();
    }

    public function begin()
    {
        return $this->impl->begin();
    }

    public function commit()
    {
        return $this->impl->commit();
    }

    public function rollback()
    {
        return $this->impl->rollback();
    }

    public function count(array $query)
    {
        return $this->impl->count($query);
    }

    public function findOne(array $query)
    {
        return $this->impl->findOne($query);
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
        return $this->impl->find($query, $sort, $skip, $limit, $fields);
    }

    public function findAll(array $query, array $sort = null, array $fields = array())
    {
        return $this->impl->findAll($query, $sort, $fields);
    }

    public function sum(array $query, array $fields = array(), array $groups = array())
    {
        return $this->impl->sum($query, $fields, $groups);
    }

    public function distinct($field, array $query)
    {
        return $this->impl->distinct($field, $query);
    }

    /**
     * 执行insert操作
     *
     * @param array $datas            
     */
    public function insert(array $datas)
    {
        return $this->impl->insert($datas);
    }

    /**
     * 执行save操作
     *
     * @param array $datas            
     */
    public function save(array $datas)
    {
        return $this->impl->save($datas);
    }

    /**
     * findAndModify
     */
    public function findAndModify(array $options)
    {
        return $this->impl->findAndModify($options);
    }

    public function update(array $criteria, array $object, array $options = array())
    {
        return $this->impl->update($criteria, $object, $options);
    }

    public function remove(array $query)
    {
        return $this->impl->remove($query);
    }
}
