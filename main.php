<?php
function debug(){
//    phpinfo();
    var_dump($_POST);
    echo "\n";

    $func = $_GET;
    if(count($_GET) == 0)
        $func = $_POST;


    $keys = array_keys($func);
    foreach ($keys as $key){
        echo "\['$key'] == {$func[$key]}<br/>";
    }
    echo "<br/>";
    echo $_SERVER['REQUEST_METHOD'] . "<br/>";
    echo $_SERVER['REQUEST_URI'];
}

debug();