<?php

namespace PhpProject45\Games;

use PhpProject45\Game\Game;

function calcGame(): Game
{
    return [
        'type' => 'calc',
        'generateQuestion' => function () {
            $number1 = mt_rand(1, 100);
            $number2 = mt_rand(1, 100);
            $operation = ['+', '-', '*'][array_rand(['+', '-', '*'])];

            return "$number1 $operation $number2";
        },
        'calculateCorrectAnswer' => function ($question) {
            eval('$result = ' . $question . ';');
            return $result;
        }
    ];
}
