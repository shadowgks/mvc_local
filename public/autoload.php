<?php
session_start();

define("ROOT_PATH",dirname(__DIR__).'/');
//app
define("APP",ROOT_PATH.'app/');
define("CONFIG",APP.'Config/');
define("CONTROLLERS",APP.'Controllers/');
define("CORE",APP.'Core/');
define("MODELS",APP.'Models/');
define("VIEWS",APP.'Views/');
define("LIBS",APP.'Libs/');

//public
define("PUBLIC__",ROOT_PATH.'public/'.'uploads/');

require_once(CONFIG.'Config.php');
require_once(CONFIG.'Helpers.php');
//Autoload All classes
$classes = [ROOT_PATH,APP,CONFIG,CONTROLLERS,CORE,MODELS,VIEWS,LIBS];
set_include_path(get_include_path().";".implode(";",$classes));
spl_autoload_register('spl_autoload');