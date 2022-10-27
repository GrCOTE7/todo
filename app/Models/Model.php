<?php

namespace App\Models;

use ORM;

abstract class Model
{
    public function __construct()
    {
        ORM::configure('mysql:host='. APP['database']['host'].';dbname=' . APP['database']['dbname']);
        ORM::configure('username', APP['database']['user']);
        ORM::configure('password', APP['database']['password']);
    }
}