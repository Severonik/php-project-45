<?php

namespace PhpProject45\Games;

use PhpProject45\Game\Game;

function primeGame(): Game
{
    return [
        'type' => 'prime',
        'generateQuestion' => function () {
            return mt_rand(1, 100);
        },
        'calculateCorrectAnswer' => function ($question) {
            return isPrime($question) ? 'yes' : 'no';
        }
    ];
}
