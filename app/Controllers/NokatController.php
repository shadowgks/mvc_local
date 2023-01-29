<?php

class NokatController
{
    function index()
    {
        $get_data = new Nokat();
        $data['nokat'] = $get_data->getAllNokat();
        View::load("nokat/index",$data);
    }
    
    //create
    function add()
    {
        View::load("nokat/add");
    }

    function store()
    {
        if(isset($_POST['add'])){
            $data = Array ("name" => $_POST['name'],
            );
        }
        $obj_insert = new Nokat();
        if($obj_insert->insertNokat($data)){
            View::load('nokat/add',['success' => 'Added Success']);
        }else{
            View::load('nokat/add',['failde' => 'Added Failde']);
        }
    }

    //delete
    function delete($id)
    {
        $db = new Nokat();
        if($db->deleteNokat($id)){
            View::load("nokat/delete",['success' => 'delete Success']);
        }else{
            View::load("nokat/delete",['failde' => 'delete Failde']);
        } 
    }

    //Get data one row
    function edit($id)
    {
        $db = new Nokat();
        if($db->seletOneNokta($id)){
            $data['row'] = $db->seletOneNokta($id);
            View::load("nokat/edit",$data);
        }else{
            echo 'error';
        } 
    }

    
    //update
    function update($id)
    {
        if(isset($_POST['update'])){
            $data = Array ("name" => $_POST['name'],
        );
        }
        $db = new Nokat();
        if($db->updateNokat($id,$data)){
            View::load("nokat/delete",['success' => 'Update Success']);
        }else{
            View::load("nokat/delete",['failde' => 'Update Failde']);
        } 
    }
}