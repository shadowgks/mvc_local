<?php

class Nokat extends DB
{
    private $table = 'nokats'; 
    private $conn;
    
    function __construct()
    {
        $this->conn = $this->connect();
    }

    //Select
    function getAllNokat()
    {
        return $this->conn->get($this->table);
    }

    //insert
    function insertNokat($data)
    {
        return $this->conn->insert($this->table, $data);
    }

    //delete
    function deleteNokat($id)
    {
        $db = $this->conn->where('id', $id);
        return $db->delete($this->table);
    }

    //read one row
    function seletOneNokta($id)
    {
        $db = $this->conn->where('id', $id);
        return $db->getOne($this->table);
    }

    //update
    function updateNokat($id,$data)
    {
        $db = $this->conn->where('id', $id);
        return $db->update($this->table,$data);
    }
}