<?php
namespace app;
use mysqli;

class Connection
{
    const SERVER_NAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DB_NAME = "time_table";

    private static $instance;
    private $connection;
    /**
     * Connection constructor.
     */
    private function __construct()
    {
        $this->connection = new mysqli(self::SERVER_NAME, self::USERNAME, self::PASSWORD, self::DB_NAME);
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . mb_convert_encoding($this->connection->connect_error, 'utf8', 'cp1251'));
        }
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }
    /**
     * @return mixed
     */
    public function query($sql)
    {
        return $this->connection->query($sql);
    }
}
