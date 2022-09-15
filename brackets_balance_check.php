<?php

require_once 'classes/Stack.php';

function check_brackets(String $text): bool
{
    $textAsArray = str_split($text);
    $charsStack = new Stack();
    $bracketsChars = ['}' =>'{', ']' => '[', ')' => '('];
    foreach ($textAsArray as $char) {
        if(in_array($char, ['[', '{', '('])) {
            $charsStack->push($char);
        }
        if(in_array($char, [']', '}', ')'])) {
            if($charsStack->peek() === $bracketsChars[$char]) {
                $charsStack->pop();
            } else {
                return false;
            }
        }
    }
    return $charsStack->isEmpty();
}

if(!isset($argv[1])) {
    echo 'There\'s no text to check';
} elseif (isset($argv[3])) {
    echo 'Wrong usage. You must quote the text';
} else {
    if($argv[1] == '-f') {
        if(!file_exists($argv[2])) {
            exit('Could not find file.');
        }
        $text = file_get_contents($argv[2]);
    } else {
        $text = $argv[1];
    }
    echo 'This is ' , check_brackets($text) ? 'balanced' : 'unbalanced' , ': ' , $text;
}