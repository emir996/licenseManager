<?php 

require_once 'config/config.php';

spl_autoload_register(function($classname){
    require_once APP_DIR . 'classes/' . $classname . '.class.php';
});