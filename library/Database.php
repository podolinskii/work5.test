<?php

class Database extends PDO{

    public function __construct()
    {
        parent::__construct('mysql:host='.DB_HOSTNAME.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    }
}