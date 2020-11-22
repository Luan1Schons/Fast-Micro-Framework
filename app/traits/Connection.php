<?php

namespace App\Traits;
use App\Database\Connection as Connect;
trait Connection {

    private $connection;

    public function __construct()
    {
        $this->connection = Connect::connection();
    }

}