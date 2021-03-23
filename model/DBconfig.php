<?php
    class Database{
        private string $servername = "localhost";
        private string $username;
        private string $password;
        private string $dbname;
        private $result = NULL;
        private $conn = NULL;

        public function __construct($username, $password, $dbname){
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
        }
        public function Connection(){
            $this->conn = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
            if($this->conn->connect_error){
                die("Connection Failed". $this->conn->connect_error);
            } 
            return $this->conn;
        }
        public function Execute($sql){
            $this->result = $this->conn->query($sql);
            return $this->result;
        }
        public function getData($tablename, $id){
            $sql = "SELECT * FROM $tablename WHERE id=$id";
            $getDB = $this->Execute($sql);
            if($getDB->num_rows > 0){
                while($row = $getDB->fetch_assoc()){
                    $data[] = $row;
                }
            }
            else{
                $data = "";
            }
            return $data;
        }
        public function getAllData($tablename){
            $sql = "SELECT * FROM $tablename";
            $getAllDB = $this->Execute($sql);
            if($getAllDB->num_rows > 0)
            {
                while($row = $getAllDB->fetch_assoc())
                { 
                    $data[] = $row;
                }
            }
            else
                $data = "";
            return $data;
        }
        public function InsertData($tablename, $sqlstr){
            $sql = "INSERT INTO $tablename VALUES($sqlstr)";
            return $this->Execute($sql);
        }
        public function UpdateData($tablename, $sqlstr, $idname, $id){
            $sql = "UPDATE $tablename SET $sqlstr WHERE $idname=$id";
            return $this->Execute($sql);
        }
        public function DeleteData($tablename, $id){
            $sql = "DELETE FROM $tablename WHERE id=$id";
            return $this->Execute($sql);
        }
        public function SearchData($tablename, $keydata, $keymain){
            $key_open = [];
            foreach($keymain as $x){
                $key_open[] = "$x REGEXP \"$keydata\"";
            }
            $keystr = implode($key_open);
            $sql = "INSERT * FROM $tablename WHERE $keystr";
            return $this->Execute($sql);
        }
    }
?>