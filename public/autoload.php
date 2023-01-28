<?php
session_start();

define("DS",DIRECTORY_SEPARATOR);
define("ROOT_PATH",dirname(__DIR__).DS);
//app
define("APP",ROOT_PATH.'app'.DS);
define("CONFIG",APP.'Config'.DS);
define("CONTROLLERS",APP.'Controllers'.DS);
define("CORE",APP.'Core'.DS);
define("MODELS",APP.'Models'.DS);
define("VIEWS",APP.'Views'.DS);
define("LIBS",APP.'Libs'.DS);
//public
define("PUBLIC__",ROOT_PATH.'public'.DS.'uploads'.DS);

//Autoload All classes
$classes = [ROOT_PATH,APP,CONFIG,CONTROLLERS,CORE,MODELS,VIEWS,LIBS];
set_include_path(get_include_path().";".implode(";",$classes));
spl_autoload_register('spl_autoload');