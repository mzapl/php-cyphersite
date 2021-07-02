<?php

function initialize(){
    $dict = array(
        'A' => ".-",
        'B' => "-...",
        'C' => "-.-.",
        'D' => "-..",
        'E' => ".",
        'F' => "..-.",
        'G' => "--.",
        'H' => "....",
        'I' => "..",
        'J' => ".---",
        'K' => "-.-",
        'L' => ".-..",
        'M' => "--",
        'N' => "-.",
        'O' => "---",
        'P' => ".--.",
        'Q' => "--.-",
        'R' => ".-.",
        'S' => "...",
        'T' => "-",
        'U' => "..-",
        'V' => "...-",
        'W' => ".--",
        'X' => "-..-",
        'Y' => "-.--",
        'Z' => "--..",
        '0' => ".----",
        '1' => "..---",
        '2' => "...--",
        '3' => "....-",
        '4' => ".....",
        '5' => "-....",
        '6' => "--...",
        '7' => "---..",
        '8' => "----.",
        '9' => "-----",
        ' ' => "____",
    );

    return $dict;
}

function morseEncrypt($data){
    $dict = initialize();
    $string = $data['usertext'];
    $result = "";

    foreach (str_split($string) as $char){
        $result = $result."${dict[$char]}";
    }
    return $result;
}

function morseDecrypt($data){
    $dict = initialize();
    $cypherDict = array_flip($dict);
    $cypher = $data['usertext'];
    $result = "";

    foreach (preg_split("/\s\s\s\s+/", $cypher) as $word){
        foreach (preg_split("/[\s,]+/", $word) as $char){
            $result = $result."${cypherDict[$char]}";
        }
        $result = $result." ";
    }
    return $result;
}

//$toDecrypt = ".--. .-. --.. -.-- -.- .-.. .- -.. --- .-- -.--    ... - .-. .. -. --.";
//morseEncrypt("PROSZE TO ZAKODOWAC", $dict);
//morseDecrypt($toDecrypt, $dict);