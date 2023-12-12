<?php

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

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function generateProgression()
{
    $length = mt_rand(5, 10);
    $start = mt_rand(1, 20);
    $step = mt_rand(1, 5);

    $progression = [$start];

    for ($i = 1; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }

    return $progression;
}

function replaceWithDots($progression, $position)
{
    $progressionWithDots = $progression;
    $progressionWithDots[$position] = '..';

    return $progressionWithDots;
}
