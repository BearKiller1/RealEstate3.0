<?php
    spl_autoload_register(function ($class_name) {
        if($class_name == "Main"){
            include $class_name . '.php';
        }
        else if($class_name == "Lucid"){
            include "../../includes/Lucid.class.php";
        }
        else if($class_name == "Connection"){
            include "../../includes/mysql.php";
        }
        else if($class_name == "Common"){
            include "../components/Common.class.php";
        }
        else{
            include 'components/'.$class_name.'/'.$class_name . '.php';
        }
    });

?>