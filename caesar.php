<?php
function initializeDicts(){
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

    return array('shiftValues' => $shiftValues, 'dict' => $dict);
}


//E(x)=(ax+b) mod m
function affine($char, $shiftArr,$a, $b){
    $x = ($shiftArr[$char] * $a + $b) % sizeof($shiftArr);
    return $x;
}

// D(x)=a^-1(x-b) mod m
function affineDecrypt($char, $shiftArr,$a, $b){
    $y = $shiftArr[$char];
    $y2 = (21 + ( $y - $b)) % 26;
    return $y2;
}

///Trying to find out the way to loop through values infinitely
function infiniteOffset($offset, $arr){
    $len = sizeof($arr);
    if($offset < 0){
        return $len + $offset;
    }

    if($offset >= $len){
        return $offset % $len;
    }

    return $offset;
}


function caesarEncryption($data){
    $dicts = initializeDicts();
    $dict = $dicts['dict'];
    $shiftArr = $dicts['shiftValues'];
    $a = $data['optional-a'];
    $b = $data['optional-b'];
    $string = $data['usertext'];

    $result = "";
    foreach (str_split($string) as $char){
        if ($char != " "){
            $newCharIndex = affine($char, $shiftArr, $a, $b);
            $result = $result.$dict[$newCharIndex];
        }else{
            $result = $result." ";
        }

    }
    return $result;
}


function caesarDecryption($data)
{
    $dicts = initializeDicts();
    $dict = $dicts['dict'];
    $shiftArr = $dicts['shiftValues'];
    $a = $data['optional-a'];
    $b = $data['optional-b'];
    $string = $data['usertext'];

    $result = "";
    foreach (str_split($string) as $char) {
        if ($char != " ") {
            $newCharIndex = affineDecrypt($char, $shiftArr, $a, $b);
            $result = $result . $dict[infiniteOffset($newCharIndex, $dict)];
        } else {
            $result = $result . " ";
        }
    }
    return $result;
}

//$a = 3;
//$b = 12;

//header('Content-type: text/plain');

//Tekst oryginalny: AFFINE CIPHER
//Tekst zaszyfrowany: IHHWVC SWFRCP
////a = 5, b = 8
//echo caesarEncryption("AFFINE CIPHER", $dict, $shiftValues, 5, 8)." ";
//echo caesarDecryption("IHHWVC SWFRCP", $dict, $shiftValues, 5, 8)." ";