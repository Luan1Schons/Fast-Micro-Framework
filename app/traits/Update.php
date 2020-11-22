<?php

namespace App\Traits;

trait Update
{
    public function Update($updateFieldsAndValues = [])
    {
        try {
             $fields = $updateFieldsAndValues['fields'];
             $where = $updateFieldsAndValues['where'];

             $updateFields = '';
             foreach(array_keys($fields) as $field)
             {
                $updateFields.="{$field} = :{$field},";
             }

            $updateFields = rtrim($updateFields, ',');
            $whereUpdate = array_keys($where);
            $bind = array_merge($fields, $where);

            $sql = sprintf("update %s set %s where %s", $this->table, $updateFields, "{$whereUpdate[0]} = :{$whereUpdate[0]}");
            try {
                $prepare = $this->connection->prepare($sql);
                return $prepare->execute($bind);
            } catch (PDOException $e) {
                var_dump($e->getMessage());
            }

        }catch(PDOException $e)
        {
            var_dump($e->getMessage());
        }
    }
}