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

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->conn) {
            $this->error = "no connect";
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ConnectDb();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function select($query) {
        $result = $this->conn->query($query) or die($this->conn->errorCode().__LINE__);

        if ($result->num_rows > 0) {
              return $result;
        } else {
            return FALSE;
        }
    }

    public function insert($query) {
        $insert = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if ($insert) {
           return $insert;
        } else {
            return FALSE;
        }
    }

    public function update($query) {
        $update = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if ($update) {
            return $update;
        } else {
            return FALSE;
        }
    }

    public function delete($query) {
        $delete = $this->conn->query() or die($this->conn->error.__LINE__);
        if ($delete) {
            return $delete;
        } else {
            return FALSE;
        }
    }
}
