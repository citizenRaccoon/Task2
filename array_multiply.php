<?php

function str_to_arr(String &$str): array|false
{
    $result = [];
    $str = substr($str, 1);
    $arrCell = '';
    while(!str_starts_with($str, ']')) {
        $char = substr($str, 0, 1);
        if(is_numeric($char)) {
            $arrCell .= $char;
        }
        if($char === ',') {
            if(!empty($arrCell)) {
                $result[] = (int)$arrCell;
            }
            $arrCell = '';
        }
        if($char === '[') {
            $result[] = str_to_arr($str);
        }
        $str = substr($str, 1);
    }
    if(!empty($arrCell)) {
        $result[] = (int)$arrCell;
    }
    return $result;
}

function arr_multiply(array $arr, int $multiplier): array
{
    foreach($arr as $key=>$item) {
        if(is_array($item)) {
            $arr[$key] = arr_multiply($item, $multiplier);
        } else {
            $arr[$key] = bcmul($item, $multiplier);
        }
    }
    return $arr;
}

function arr_to_str($arr): string
{
    $result = "[";
    for ($i = 0; $i < count($arr); $i++) {
        if($i > 0) {
            $result .= ", ";
        }
        if(is_array($arr[$i])) {
            $result .= arr_to_str($arr[$i]);
        } else {
            $result .= $arr[$i];
        }
    }
    $result .= "]";
    return $result;
}

function check_brackets($string): bool
{
    $offset = 0;
    $openBracketCount = 0;
    while($offset !== FALSE) {
        $offset = strpos($string, '[', $offset);
        $openBracketCount++;
        $offset++;
    }
    $offset = 0;
    $closeBracketCount = 0;
    while($offset !== FALSE) {
        $offset = strpos($string, ']', $offset);
        $offset++;
        $closeBracketCount++;
    }

    return $openBracketCount == $closeBracketCount;
}

if(empty($argv[2])) {
    echo 'Array or/and multiplier are missing.';
} else {
    if($argv[1] == '-f') {
        if(!file_exists($argv[2])) {
            exit('Could not find file.');
        }
        $arrToCheck = file_get_contents($argv[2]);
        $multiplier = $argv[3];
    } else {
        $arrToCheck = $argv[1];
        $multiplier = $argv[2];
    }
    if (!is_numeric($multiplier)) {
        echo 'Multiplier must be a number.';
    } elseif (substr($arrToCheck, 0, 1) != '[') {
        echo 'Array need to begin with square bracket "["';
    } elseif (!check_brackets($arrToCheck)) {
        echo 'Open brackets count must be the same as close brackets.';
    } else {
        $arr = str_to_arr($arrToCheck);
        $arr = arr_multiply($arr, $multiplier);
        echo arr_to_str($arr);
    }
}