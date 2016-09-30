<?php
    function __autoload($classname) {
        $filename = "../db/". $classname .".php";
        include_once($filename);
    }
    ini_set("auto_detect_line_endings", true);
    $mySQLConnection = new MySQLClass(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);

    
    }
?>