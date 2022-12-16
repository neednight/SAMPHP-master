<?php
    $classesDir = array (
        ROOT_DIR.'Callbacks/',
    );
    function __autoload($class_name) {
        global $classesDir;
        foreach ($classesDir as $directory) {
            if (file_exists($directory . $class_name . '.php')) {
                require_once ($directory . $class_name . '.php');
                return;
            }
        }
    }    
?>