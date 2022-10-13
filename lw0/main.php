<?php

function valid(string $expression): bool
{
    if (strpbrk($expression, '01234567890+-*/') && !strpbrk($expression, '/0')) {
        return true;
    }
    return false;
}

function calculator(string $expression): int
{
    if (!valid($expression)) {
        return "Incorrect input";
    }
    $rawTokens = [];
    $lastToken = '';
    $expression = str_split($expression);

    foreach ($expression as $symbol) {
        if (is_numeric($symbol) && $lastToken != '') {
            $lastToken = $lastToken . $symbol;
            continue;
        } elseif (is_numeric($symbol)) {
            $rawTokens[] = $symbol;
            continue;
        }
        if ($lastToken != '' && strpbrk($element, '+-*/')) {
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
        foreach ($rawTokens as $key => $element) {
            if ($element === '') {
                unset($rawTokens[$key]);
            }
        }
        $rawTokens = array_values($rawTokens);
        foreach ($rawTokens as $key => $element) {
            if (strpbrk($element, '*/')) {
                if ($element == '*') {
                    $rawTokens[$key] = $lastNubmer * $rawTokens[$key + 1];
                    $lastNubmer = $rawTokens[$key + 1];
                    $rawTokens[$key - 1] = '';
                    $rawTokens[$key + 1] = '';
                }
                if ($element == '/') {
                    $rawTokens[$key] = $lastNubmer / $rawTokens[$key + 1];
                    $lastNubmer = $rawTokens[$key + 1];
                    $rawTokens[$key - 1] = '';
                    $rawTokens[$key + 1] = '';
                }
                break;
            }
            if (is_numeric($element) && $element !== $lastNubmer) {
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

    foreach ($rawTokens as $key => $element) {
        if ($element === '') {
            unset($rawTokens[$key]);
        }
    }
    $rawTokens = array_values($rawTokens);
    while (strpbrk(implode($rawTokens), '+-')) {
        $rawTokens = array_values($rawTokens);
        foreach ($rawTokens as $key => $element) {
            if ($element === '') {
                unset($rawTokens[$key]);
            }
        }
        $rawTokens = array_values($rawTokens);

        foreach ($rawTokens as $key => $element) {
            if (strpbrk($element, '+-')) {
                if ($element == '+') {
                    $rawTokens[$key] = $lastNubmer + $rawTokens[$key + 1];
                    $lastNubmer = $rawTokens[$key + 1];
                    $rawTokens[$key - 1] = '';
                    $rawTokens[$key + 1] = '';
                }
                if ($element == '-') {
                    $rawTokens[$key] = $lastNubmer - $rawTokens[$key + 1];
                    $lastNubmer = $rawTokens[$key + 1];
                    $rawTokens[$key - 1] = '';
                    $rawTokens[$key + 1] = '';
                }
                break;
            }
            if (is_numeric($element) && $element !== $lastNubmer) {
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
    foreach ($rawTokens as $key => $element) {
        if ($element === '') {
            unset($rawTokens[$key]);
        }
    }
    $rawTokens = array_values($rawTokens);
    $tokens = $rawTokens;
    return $tokens[0];
}

echo calculator('1+1*9') . "\n";
