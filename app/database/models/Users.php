<?php

namespace App\Database\Models;

/*
** Model Users
*/
class Users extends BaseModels
{
    protected $table = 'user';

    public function listUsers()
    {
        $users = $this->find();

        return $users;
    }

    public function createUser($data)
    {

        $users = $this->create($data);
        return $users;

    }

    public function updateUser()
    {
        
    }


}