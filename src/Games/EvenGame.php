<?php

namespace PhpProject45\Games;

use PhpProject45\Game\Game;

function evenGame(): Game
{
    return [
        'type' => 'even',
        'generateQuestion' => function () {
            return mt_rand(1, 100);
        },
        'calculateCorrectAnswer' => function ($question) {
            return $question % 2 === 0 ? 'yes' : 'no';
        }
    ];
}
