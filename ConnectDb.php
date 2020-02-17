<?php


class ConnectDb
{
    private static $instance = null;
    private $conn;
    private $error;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root1234';
    private $dbname = 'singletonDb';

    /**
     * Check Connected database query
     * @param $query
     * @return void
     */
    private function checkConnectDb($query)
    {
        $query = $this->conn->query($query) or die($this->conn->error . __LINE__);
    }

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->conn) {
            $this->error = "no connect";
        }
    }

    /**
     * @return ConnectDb|null
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ConnectDb();
        }

        return self::$instance;
    }

    /**
     * @return mysqli
     */
    public function getConnection()
    {
        return $this->conn;
    }

    /**
     * Select database query
     * @param $query
     * @return bool|void
     */
    public function select($query)
    {
        $result = $this->checkConnectDb($query);

        if ($result->num_rows > 0) {
            return $result;
        }

        return false;
    }

    /**
     * Update database query
     * @param $query
     * @return bool|void
     */
    public function insert($query) {
        $insert = $this->checkConnectDb($query);
        if ($insert) {
            return $insert;
        }

        return false;
    }

    /**
     * Update database query
     * @param $query
     * @return bool|void
     */
    public function update($query) {
        $update = $this->checkConnectDb($query);
        if ($update) {
            return $update;
        }

        return false;
    }

    /**
     * @param $query
     * @return bool|void
     */
    public function delete($query) {
        $delete = $this->checkConnectDb($query);
        if ($delete) {
            return $delete;
        }

        return false;

    }
}
