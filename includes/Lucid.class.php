<?php

include 'mysql.php';

class Lucid extends Connection {
    
    public function __construct() {
        Parent::__construct();
    }

    /**
     * Inserts data in table
     * @param  string   $table  table name
     * @param  array    $fields fields to be inserted
     * @return boolean  1 - success, 0 - failure
     */
    public function InsertData($tableName, $request, $callback = false) {
        
        $this->request = $request;

        $val = "";
        $columns = "";

        for($i = 0; $i != COUNT($this->request); $i++){
            if($i+1 == COUNT($this->request))
                $columns .= array_keys($this->request)[$i];
            else
                $columns .= array_keys($this->request)[$i]. ","; 
        }


        for($i = 0; $i != COUNT($this->request); $i++){
            if($i+1 == COUNT($this->request))
                $val .= "?";
            else
                $val .= "?,";
        }

        $sql = "INSERT INTO  " . $tableName . " ($columns) VALUES ( $val)";

        for ($i=0; $i < COUNT($this->request); $i++) { 
            $values[] = $this->request[array_keys($this->request)[$i]];
        }

        $this->checker = Parent::Add($sql, $values, $callback);
        
        if($this->checker == 0){
            return $sql;
        }
        else{
            return $this->checker;
        }
    }

    /**
     * @param string $sql query to be executed
     * @return array values of the ? placeholders
     * @return boolean 1 - success, 0 - failure
     */
    public function GetData($sql, $request){
       
        for ($i=0; $i < COUNT($request); $i++) { 
            $values[] = $request[array_keys($request)[$i]];
        }
        return Parent::Get($sql, $values);
    }

    /**
     * Runs a query
     * @param  string   $sql query to be executed
     * @return boolean  1 - success, 0 - failure
     */
    public function RunQuery($sql){
        return Parent::Run($sql);
    }

    /**
     * Delete Files
     * @todo Think about it mann
     */
    public function DeleteDta(){

    }
}


?>