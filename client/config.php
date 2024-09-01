<?php
    define('BASE_PATH','http://localhost/servo/');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'servo');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    
    date_default_timezone_set("Asia/Kolkata");
    $mysqli=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    header("Access-Control-Allow-Origin: http://0.0.0.0:5000");
    header("Access-Control-Allow-Methods: GET");
?>