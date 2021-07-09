<?php

namespace Src\App;

use PDO;

class Database {
    const HOST = "localhost";
    const DB = "test";
    const USER = "root";
    const PASSWORD = '5@%gFtF$rx';

    public static function getConnection() : \PDO {
        $connectionString = "mariadb:host=".self::HOST."dbname=".self::DB;
        $connection = new PDO($connectionString, self::USER, self::PASSWORD,
            array(
                \PDO::ATTR_DEFAULT_FETCH_MODE   => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES     => false,
                \PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_FOUND_ROWS     => true,
                \PDO::MYSQL_ATTR_INIT_COMMAND   => "SET NAMES utf8"
            ));
        return $connection;
    }
}
