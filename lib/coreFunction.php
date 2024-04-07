<?php
include_once("db.php");
class ConeFunction extends Database
{

   



    function setQuery($sql)
    {

        $result = $this->conn->query($sql);

        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }
    function getAll($sql)
    {
        $result = $this->setQuery($sql);
        $a = array();
        while ($row = $result->fetch_assoc()) {
            $a[] = $row;
        }

        return $a;
    }

    function getOne($sql)
    {
        $result = $this->setQuery($sql);
        $a = $result->fetch_assoc();
        return $a;
    }

    function addRecord($table, $params = array())
    {
        $sql = "INSERT INTO " . $table . "(";
        $txtKey = "";
        $txtValue = "";
        $i = 0;
        foreach ($params as $key => $value) {
            if ($i < count($params) - 1) {
                $txtKey .= "`" . $key . "`,";
                $txtValue .= "'" . $value . "',";
            } else {
                $txtKey .= "`" . $key . "`";
                $txtValue .= "'" . $value . "'";
            }
            $i++;
        }
        $sql .= $txtKey;
        $sql .= ") VALUES(";

        $sql .= $txtValue;
        $sql .= ")";

        $this->setQuery($sql);
    }



    function editRecord($table, $id, $params)
    {
        $txtSet = "";
        $i = 0;
        foreach ($params as $key => $value) {
            if ($i < count($params) - 1) {

                $txtSet .= "$key = '$value', ";
            } else {
                $txtSet .= "$key = '$value' ";
            }
            $i++;
        }
        $sql = "UPDATE " . $table . " SET " . $txtSet . "WHERE id = $id";

        $this->setQuery($sql);
    }

    function delRecord($table, $id){
        $sql=" DELETE FROM ".$table." WHERE id=".$id;
        $this->setQuery($sql);
    }


    //kiểm tra sự tồn tại trang admin addCat
    function checkExist($table, $record, $value)
    {
        $sql = "SELECT * FROM $table WHERE $record ='$value'";
        $result = $this->getAll($sql);
        $message = "";
        if (count($result) > 0) {
            $message = "$value đã tồn tại";
            return $message;
        }
        return 1;
    }

    // message
    function message($txt)
    {
        $url = $_SERVER['REQUEST_URI'];
        $s = "<script>";
        $s .= "confirm('" . $txt . "');";
        $s .= "window.location= '" . $url . "' ";
        $s .= "</script>";
        echo $s;
    }
    

    
}
