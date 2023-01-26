<?php
    class Connection{
        public static function GetConnection(){
            try {
                $server="127.0.0.1";
                $db="students";
                $un="root";
                $pw="";
                $conn = new PDO("mysql:host=$server;dbname=$db",$un,$pw);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $conn; 
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }
    
?>