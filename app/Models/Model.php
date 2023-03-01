<?php

namespace App\Models;

use ORM;
use PDO;

abstract class Model
{
    public function __construct()
    {
        ORM::configure('mysql:host='. APP['database']['host'].';dbname=' . APP['database']['dbname']);
        ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        ORM::configure('username', APP['database']['user']);
        ORM::configure('password', APP['database']['password']);
    }
}