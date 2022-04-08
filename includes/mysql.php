<?php
    
    // $servername = "bpsin91g95fditjmzhzw-mysql.services.clever-cloud.com";
    // $username = "uditv2kgxca2jstv";
    // $password = "sjanM2u8FHVdfmd6McZo";
    // $dbname = "bpsin91g95fditjmzhzw";


    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "lucid";
    
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // $servername = "bsxaorxlkrky3m8ot1xa-mysql.services.clever-cloud.com";
    // $username = "uaoqwuaocvhfpm4e";
    // $password = "VGCotUjXNf2u602RFHYa";
    // $dbname = "bsxaorxlkrky3m8ot1xa";

    
    class Connection{
    
        public function __construct(){
            $this->data = array();  
            
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "RealEstate";
            
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        }

        public function Add($sql, $values, $callback){
            
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($values);
                if($callback)
                    $this->data = $this->conn->lastInsertId();
                else
                    $this->data = 1;
            } catch (Exception $e) {
                $this->data = 0;
                throw $e;
            } finally{
                return $this->data;
            }

        }

        public function Get($sql, $request){

            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($request);
                $this->data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (\Throwable $th) {
                $this->data = 0;
                throw $th;
            } finally {
                return $this->data;
            }
        }

        public function Run($sql){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $this->data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (\Throwable $th) {
                $this->data = 0;
                throw $th;
            } finally {
                return $this->data;
            }
        }

    }

?>