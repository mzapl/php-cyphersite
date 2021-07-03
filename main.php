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
    $data = $_GET;
    if(count($_GET) == 0){
        $data = $_POST;
    }


    return $data;
}

function normalize($string){
    $polishSigns = array('Ą'=>'A','Ć'=>'C','Ę'=>'E','Ł'=>'L', 'Ń'=>'N', 'Ó'=>'O', 'Ś'=>'S', 'Ż'=>'Z','Ź'=>'Z');
    foreach (str_split($string) as $char){
        if(array_key_exists($char, $polishSigns)){
            str_replace($char, $polishSigns[$char], $string);
        }
    }
    return $string;
}

function debug(){
    phpinfo();
    $func = $_GET;
    if(count($_GET) == 0){
        $func = $_POST;
    }

    $keys = array_keys($func);
    foreach ($keys as $key){
        echo "\['$key'] == {$func[$key]}<br/>";
    }
    echo "<br/>";
    echo $_SERVER['REQUEST_METHOD'] . "<br/>";
    echo $_SERVER['REQUEST_URI'];
}

$data = data();
$data['usertext']  = normalize(trim(strtoupper($data['usertext'])));
//$data['usertext'] = trim(strtoupper($data['usertext']));

$selection = selectCipher($data);
$result = $selection($data);

require "index.html";
echo "<label for='resulttext'>Wynik:</label>";
echo "<div class='span6'>";
echo "<textarea id='resulttext' name='resulttext' class='form-control'  rows='6' readonly>".trim($result)."</textarea>";
echo "</div></form></div>";
echo "<script src='js/result.js'></script>";