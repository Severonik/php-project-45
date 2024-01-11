<?php

function calcGame()
{
    return [
        'question' => 'What is the result of the expression?',
        'generateQuestion' => function () {
            $number1 = mt_rand(1, 100);
            $number2 = mt_rand(1, 100);
            $operation = ['+', '-', '*'][array_rand(['+', '-', '*'])];

            return "$number1 $operation $number2";
        },
        'calculateCorrectAnswer' => function ($question) {
            $result = 0;
            eval('$result = ' . $question . ';');
            return $result;
        }
    ];
}
