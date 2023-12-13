<?php

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

function progressionGame()
{
    return [
        'type' => 'progression',
        'generateQuestion' => function () {
            $progression = generateProgression();
            $hiddenPosition = mt_rand(0, count($progression) - 1);

            $progressionWithDots = replaceWithDots($progression, $hiddenPosition);

            return [
                'question' => implode(' ', $progressionWithDots),
                'hiddenPosition' => $hiddenPosition,
                'hiddenNumber' => $progression[$hiddenPosition],
            ];
        },
        'calculateCorrectAnswer' => function ($questionData) {
            return strval($questionData['hiddenNumber']);
        },
        'askUserAnswer' => function () {
            return readline("Your answer: ");
        },
    ];
}
