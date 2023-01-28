<?php

class App
{
    protected $controller;
    protected $action;
    protected $params = [];

    function __construct()
    {
        $this->prepareURL();
        $this->render();
    }

    /*
    *DEFINE Controller and action and params
    *return void
    */
    private function prepareURL()
    {
        //URL
        $url = $_SERVER['REQUEST_URI'];
        if(!empty($url)){
            $trim =  trim($url,'/');
            $url = explode('/',$trim);
            
            // DEFINE THE CONTROLLER
            $this->controller = isset($url[0]) ? ucwords($url[0])."Controller" : "HomeController";
            
            // DEFINE THE ACTION
            $this->action = isset($url[1]) ? $url[1] : "index";
            unset($url[0],$url[1]);

            // DEFINE THE PARAMS
            $this->params = !empty($url[2]) ? array_values($url) : [];
        }
    }

    /*
    *CHECK if class and methode is exist 
    *return void
    */
    private function render()
    {
        if(class_exists($this->controller)){
            $controllerHome = new $this->controller;
            if(method_exists($controllerHome, $this->action)){ 
                call_user_func_array([$controllerHome,$this->action], $this->params);
            }else{
                echo "This Methode Not Exist!";
            }
        }else{
            echo "This Class <b>".$this->controller."</b> Not Exist!";
        }
    }
}