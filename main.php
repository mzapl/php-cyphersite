<?php

foreach (['morse.php', 'caesar.php', 'vingenere.php'] as $x){
    require($x);
}

function selectCipher($data){
    $cipher = $data['cipher'];
    $function = $data['function'];
    switch ($cipher){
        case "morse":
            return selectFunction($function, 'morseEncrypt', 'morseDecrypt');
        case "affine":
            return selectFunction($function, 'caesarEncryption', 'caesarDecryption');
        case "vingenere":
            return selectFunction($function, 'vingenereLoop', 'vingenereLoop');
    }
}

function selectFunction($function, $encrypt, $decrypt){
    if($function === "encode")
        return $encrypt;
    return $decrypt;
}



function data(){
//    phpinfo();
    $func = $_GET;
    if(count($_GET) == 0){
        $func = $_POST;
        $data = $_POST;
    }

    $keys = array_keys($func);
    foreach ($keys as $key){
        echo "\['$key'] == {$func[$key]}<br/>";
    }
    echo "<br/>";
    echo $_SERVER['REQUEST_METHOD'] . "<br/>";
    echo $_SERVER['REQUEST_URI'];

    return $data;
}

$data = data();
$data['usertext'] = strtoupper($data['usertext']);
$selection = selectCipher($data);
//echo $selection($data);
require "index.html";
echo "<script src='js/result.js'></script>";