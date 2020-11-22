<?php

namespace App\Database\Models;

use App\Traits\Read;
use App\Traits\Connection;
use App\Traits\Create;
use App\Traits\Update;
use App\Traits\Delete;

abstract class BaseModels 
{
    use Read, Create, Update, Delete, Connection;
}