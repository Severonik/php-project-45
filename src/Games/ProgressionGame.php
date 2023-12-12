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
    $length = mt_rand(5, 10);
    $hiddenPosition = mt_rand(0, $length - 1); // Добавлено определение $hiddenPosition

    return [
        'type' => 'progression',
        'generateQuestion' => function () use ($hiddenPosition) { // Использование $hiddenPosition
            $progression = generateProgression();

            $progressionWithDots = replaceWithDots($progression, $hiddenPosition);

            return [
                'question' => implode(' ', $progressionWithDots),
                'hiddenPosition' => $hiddenPosition,
            ];
        },
        'calculateCorrectAnswer' => function ($questionData) {
            $progression = explode(' ', $questionData['question']);
            $hiddenNumber = $progression[$questionData['hiddenPosition']];

            return $hiddenNumber;
        }
    ];
}
