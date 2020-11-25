<?php
define('HOST', 'localhost');
define('DATABASENAME', 'beadando');
define('USERNAME', 'root');
define('PASSWORD', '');

class Database
{
    private static $connection = FALSE;

    public static function getConnection()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASENAME);

            if (self::$connection->connect_error) {
                exit('Error connecting to database');
            }

            self::$connection->set_charset("utf8");
        }
        return self::$connection;
    }
}
