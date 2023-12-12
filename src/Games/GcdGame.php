<?php

function gcd($a, $b)
{
    while ($b !== 0) {
        $remainder = $a % $b;
        $a = $b;
        $b = $remainder;
    }

    return $a;
}

function gcdGame()
{
    return [
        'type' => 'gcd',
        'question' => function () {
            $number1 = mt_rand(1, 100);
            $number2 = mt_rand(1, 100);
            return "$number1 $number2";
        },
        'correctAnswer' => function ($question) {
            list($number1, $number2) = explode(' ', $question);
            return gcd($number1, $number2);
        },
    ];
}