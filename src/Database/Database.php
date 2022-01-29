<?php

namespace JumasCola\TestTask\Database;

require dirname(__FILE__, 3).'/src/bootstrap.php';

class Database {

    private static $db;
    private $connection;

    private function __construct()
    {
        $database = getenv('DB_DATABASE');
        $host = getenv('DB_HOST');
        $user = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');

        try {
            $this->connection = new \PDO("mysql:dbname={$database};host={$host}", $user, $password );
            $this->connection->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        } catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function __destruct()
    {
        $this->connection = null;
    }

    public static function getConnection()
    {
        if ( !isset( self::$db) ) {
            self::$db = new Database();
        }

        return self::$db->connection;
    }
}
