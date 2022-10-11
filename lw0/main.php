<?php

function valid(string $expression): bool {
    if (strpbrk($expression, '01234567890+-*/') and !strpbrk($expression, '/0')){
        return true;
    }
    return false;
}

function calculator(string $expression): int {
    if (!valid($expression)) {
        return "Incorrect input";
    }
    $rawTokens = [];
    $lastToken = '';
    $expression = str_split($expression);

    foreach ($expression as $symbol){
        if (is_numeric($symbol) and $lastToken != '') {
            $lastToken = $lastToken . $symbol;
            continue;
        } elseif (is_numeric($symbol)) {
            $rawTokens[] = $symbol;
            continue;
        }
        if ($lastToken != '' and strpbrk($element, '+-*/')) {
            $rawTokens[] = $lastToken;
            $lastToken = '';
            continue;
        }
        $rawTokens[] = $symbol;
        
    }
    var_dump($rawTokens);
    $lastNubmer = '';
    $lastNubmerIndex = '';
    $tokens = [];

    while (strpbrk(implode($rawTokens), '*/')) {
        foreach ($rawTokens as $key => $element){
            if ($element === ''){
                unset($rawTokens[$key]);
            }
        }
        $rawTokens = array_values($rawTokens);
        foreach ($rawTokens as $key => $element) {
            if (strpbrk($element, '*/')){
                if ($element == '*'){
                    $rawTokens[$key] = $lastNubmer * $rawTokens[$key+1];
                    $lastNubmer = $rawTokens[$key+1];
                    $rawTokens[$key-1] = '';
                    $rawTokens[$key+1] = '';
                }
                if ($element == '/'){
                    $rawTokens[$key] = $lastNubmer / $rawTokens[$key+1];
                    $lastNubmer = $rawTokens[$key+1];
                    $rawTokens[$key-1] = '';
                    $rawTokens[$key+1] = '';
                }
                break;
            }
            if (is_numeric($element) and $element !== $lastNubmer) {
                $lastNubmer = $element;
                $lastNubmerIndex = $key;
                $tokens[] = $element;
                continue;
            }
            if (strpbrk($element, '+-')) {
                $tokens[] = $element;
            }
        }
    }

    foreach ($rawTokens as $key => $element){
        if ($element === ''){
            unset($rawTokens[$key]);
        }
    }
    $rawTokens = array_values($rawTokens);
    while (strpbrk(implode($rawTokens), '+-')){
        $rawTokens = array_values($rawTokens);
        foreach ($rawTokens as $key => $element){
            if ($element === ''){
                unset($rawTokens[$key]);
            }
        }
        $rawTokens = array_values($rawTokens);
        
        foreach ($rawTokens as $key => $element){
            if (strpbrk($element, '+-')){
                if ($element == '+'){
                    $rawTokens[$key] = $lastNubmer + $rawTokens[$key+1];
                    $lastNubmer = $rawTokens[$key+1];
                    $rawTokens[$key-1] = '';
                    $rawTokens[$key+1] = '';
                }
                if ($element == '-'){
                    $rawTokens[$key] = $lastNubmer - $rawTokens[$key+1];
                    $lastNubmer = $rawTokens[$key+1];
                    $rawTokens[$key-1] = '';
                    $rawTokens[$key+1] = '';
                }
                break;
            }
            if (is_numeric($element) and $element !== $lastNubmer){
                $lastNubmer = $element;
                $lastNubmerIndex = $key;
                $tokens[] = $element;
                continue;
            }
            if (strpbrk($element, '+-')){
                $tokens[] = $element;
            }
        }
    }
    foreach ($rawTokens as $key => $element){
        if ($element === ''){
            unset($rawTokens[$key]);
        }
    }
    $rawTokens = array_values($rawTokens);
    $tokens = $rawTokens;
    return $tokens[0];
}

function sumTime(string $a, string $b): string{
    if (!strpbrk($a, '1234567890:') or !strpbrk($b, '1234567890:')){
        return 'Incorrect input';
    }
    $result = ["", "", ""];
    $a = explode(':', $a);
    $b = explode(':', $b);
    //var_dump($a);
    if ($a[2] + $b[2] < 60){
        $result[2] = $a[2]+ $b[2];
    } else {
        $diff = $a[2] + $b[2] - 60;
        $result[2] = $diff;
        $a[1] = $a[1] + 1;
        //var_dump($a);
    }
    //var_dump($result);
    if ($a[1] + $b[1] < 60){
        $result[1] = $a[1]+ $b[1];
    } else {
        $diff = $a[1] + $b[1] - 60;
        $result[1] = $diff;
        $a[0] = $a[0] + 1;
    }
    //var_dump($result);
    if ($a[0] + $b[0] < 24){
        $result[0] = $a[0]+ $b[0];
    } else {
        $diff = $a[0] + $b[0] - 24;
        $result[0] = $diff;
    }
    foreach ($result as $key => $value){
        if (count(str_split(strval($value))) == 1){
            $result[$key] = "0" . strval($result[$key]);
        }
    }
    $result = implode(":", $result);
    var_dump($result);
    return $result;
}

echo calculator('1+1*9') . "\n";
echo sumTime('10:20:30', '10:20:30');
?>