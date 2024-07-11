<?php
/*
 *  Db class, encapsulates the functionality for the database integration for reusability
 */
class Db {
    protected  $servername = "127.0.0.1";
    protected  $dbUsername = "root";
    protected  $dbPassword = "";
    protected  $dbName = "university";
    public $conn;
    public $lastInsertedId;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->dbUsername, $this->dbPassword, $this->dbName);
    }

    public function sqlExec($query) {
        $result = $this->conn->query($query);
        $this->lastInsertedId = $this->conn->insert_id;
        $response = array();

        if(is_bool($result)) {
            return $result;
        }else {
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $response[] = $row;
                }
            }
        }
        return $response;
    }

}



