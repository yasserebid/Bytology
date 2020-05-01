<?php
class DBConnection
{

    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $database = 'bytology_task';
    private $username = 'root';
    private $password = '';

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        // Error handling
        if ($this->connection->connect_error) {
            die("Connection failed: " .$this->connection->connect_error);
        }
    }
    protected function __clone()
    {
        throw new \Exception("Cannot clone this class");
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize this class");
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DBConnection();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
    public function closeConnection()
    {
        $this->connection->close();
    }
}
