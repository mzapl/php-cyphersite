<?php

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

function morseEncrypt($string, $dict){
    foreach (str_split($string) as $char){
        echo "${dict[$char]} ";
    }
}

function morseDecrypt($cypher, $dict){
    $cypherDict = array_flip($dict);
    foreach (preg_split("/\s\s\s\s+/", $cypher) as $word){
        foreach (preg_split("/[\s,]+/", $word) as $char){
            echo "${cypherDict[$char]}";
        }echo " ";
    }
}

$toDecrypt = ".--. .-. --.. -.-- -.- .-.. .- -.. --- .-- -.--    ... - .-. .. -. --.";
//morseEncrypt("PROSZE TO ZAKODOWAC", $dict);
morseDecrypt($toDecrypt, $dict);