<?php
$shiftValues = array(
    'A' => 0,
    'B' => 1,
    'C' => 2,
    'D' => 3,
    'E' => 4,
    'F' => 5,
    'G' => 6,
    'H' => 7,
    'I' => 8,
    'J' => 9,
    'K' => 10,
    'L' => 11,
    'M' => 12,
    'N' => 13,
    'O' => 14,
    'P' => 15,
    'Q' => 16,
    'R' => 17,
    'S' => 18,
    'T' => 19,
    'U' => 20,
    'V' => 21,
    'W' => 22,
    'X' => 23,
    'Y' => 24,
    'Z' => 25,
);

$dict = array_flip($shiftValues);
$a = 3;
$b = 12;

function affine($char, $shiftArr,$a, $b){
    $x = ($shiftArr[$char] * $a + $b) % sizeof($shiftArr);
    return $x;
}

function caesarEncryption($string, $dict, $shiftArr,  $a, $b){
    $result = "";
    foreach (str_split($string) as $char){
        $newCharIndex = affine($char, $shiftArr, $a, $b);
        $result = $result.$dict[$newCharIndex];
    }
    return $result;
}

//Tekst orginalny: VENI
//Tekst zaszyfrowany: XYZK
$newline = "<br></br>";
echo caesarEncryption("VENI", $dict, $shiftValues, $a, $b).$newline;
echo caesarEncryption("VENI", $dict, $shiftValues, 2*$a, 2*$b).$newline;