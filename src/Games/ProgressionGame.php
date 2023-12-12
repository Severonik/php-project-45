<?php

namespace PhpProject45\Games;

use PhpProject45\Game\Game;

function progressionGame(): Game
{
    return [
        'type' => 'progression',
        'generateQuestion' => function () {
            $progression = generateProgression();
            $hiddenPosition = mt_rand(0, count($progression) - 1);

            $progressionWithDots = replaceWithDots($progression, $hiddenPosition);

            return implode(' ', $progressionWithDots);
        },
        'calculateCorrectAnswer' => function ($question) {
            $progression = explode(' ', $question);
            $hiddenNumber = $progression[$hiddenPosition];

            return $hiddenNumber;
        }
    ];
}
