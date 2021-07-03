<?php
function vingenereLoop($data){
    $dictionary = array(
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

    $message = $data['usertext'];
    $key = generateKey($message, $data['optional-key']);
    $decrypt = $data['function'] === 'decode';

    $result = "";
    $func = 'vingenereEncryption';

    if($decrypt){
        $func = 'vingenereDecryption';
    }

    foreach (range(0, strlen($message)-1) as $i){
        if(array_key_exists($key[$i], $dictionary) && array_key_exists($message[$i], $dictionary)){
            $index = $func($dictionary[$message[$i]], $dictionary[$key[$i]]);
            $result = $result.array_flip($dictionary)[$index];
        }else
            $result = $result.$message[$i];

    }
    return $result;
}

function vingenereEncryption($litera, $klucz){
    $result = ($litera + $klucz) % 26;
    return $result;
}

function vingenereDecryption($litera, $klucz){
    $result = abs($litera - $klucz + 26) % 26;
    return $result;
}

function generateKey($message, $key){
    $times = ceil(strlen($message) / strlen($key));
    $result = str_repeat($key, $times);
    return substr($result, 0, strlen($message));
}

////A + L == L
//vingenereEncryption(0, 11);
//
////T + E == X
//vingenereEncryption(19, 4);

//$message = "ATTACKATDAWN";
//$keyword = "LEMON";
//$key = generateKey($message, $keyword);
//vingenereLoop($dictionary, $message, $key, false);



