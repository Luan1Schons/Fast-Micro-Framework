<?php

namespace App\Traits;

/* 
** Trait for read database registers
*/
trait Read {
    public function find($fetchAll = true)
    {
        try {
            $query = $this->connection->query("SELECT * FROM user");
            return $fetchAll ? $query->fetchAll() : $query->fetch();

        } catch (PDOException $e) {
           var_dump($e->getMessage());
        }
    }

    public function findBy($field, $value, $fetchAll = true)
    {
        try {
            $prepared = $this->connection->prepare("SELECT * FROM {$this->table} WHERE {$field} = :{$field}");
            $prepared->bindValue(":{$field}", $value);
            $prepared->execute();
            return $fetchAll ? $prepared->fetchAll() : $prepared->fetch();

            return $prepared->fetchAll();

        } catch (PDOException $e) {
           var_dump($e->getMessage());
        }
    }
}
