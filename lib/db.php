<?php
class Database
{

    private $localhost = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'nguyenvinh';
    public $conn;
    function __construct()
    {
        $this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Error" . $this->conn->connect_error);
        } else
            echo " Kết nói thành công";
    }
}
