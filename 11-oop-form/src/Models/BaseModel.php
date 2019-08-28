<?php

namespace Bootcamp\Models;

use PDO;
use PDOStatement;

class BaseModel
{
    protected $table = '';
    protected $idField = 'id';

    /**
     * @var PDO
     */
    protected $db;

    public function setDb(PDO $db){
        $this->db = $db;
    }

    public function __construct(PDO $db = null)
    {
        $this->db = $db;
    }

    public function find($key, $value)
    {
        $stmt = $this->db->prepare(sprintf("SELECT * FROM %s WHERE %s = ?", $this->table, $key));
        $stmt->execute([$value]);

        return $this->query($stmt);
    }

    public function load($id)
    {
        return $this->find($this->idField, $id);
    }

    public function query(PDOStatement $stmt) {
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);

        $object = $stmt->fetch();

        if ($object == false) {
            return null;
        }

        $object->setDb($this->db);

        return $object;
    }

    public function queryList(PDOStatement $stmt) : array {
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);

        $objects = [];
        while ($object = $stmt->fetch()) {
            if ($object == false) {
                continue;
            }

            $object->setDb($this->db);
            $objects[] = $object;
        }

        return $objects;
    }
}
