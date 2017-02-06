<?php
class Database{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "angular";
    private $username = "root";
    private $password = "";
    public $conn;

    // get the database connection
    public function getConnection() {
        $this->conn = null;
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Check connection
        if ($this->conn->connect_error) {
            throw new Exception("Connection to database server " . $this->db_name . " failed: " .
                $this->conn->connect_error);
        }

        return $this->conn;
    }
}