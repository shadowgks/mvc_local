<?php

require_once(LIBS.'DB/MysqliDb.php');

class DB{
    protected $database;

    function connect(){
        $db = new MysqliDb(HOST, USERNAME, PASSWORD, DBNAME);
        if(!$db->connect()){
            $this->database = $db;
            return $this->database;
        }else{
            echo 'Data Base Not Working';
        }
    }
}