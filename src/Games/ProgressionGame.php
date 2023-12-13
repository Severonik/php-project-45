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

function replaceWithDots(array $progression, int $position)
{
    $progressionWithDots = $progression;
    if (isset($progressionWithDots[$position])) {
        $progressionWithDots[$position] = '..';
    } else {
        // Обработка ситуации, когда указанная позиция отсутствует в массиве
    }

    return $progressionWithDots;
}

function progressionGame()
{
    $progression = [];
    $hiddenPosition = 0;

    return [
        'type' => 'progression',
        'generateQuestion' => function () use (&$progression, &$hiddenPosition) {
            $progression = generateProgression();
            $hiddenPosition = mt_rand(0, count($progression) - 1);

            $progressionWithDots = replaceWithDots($progression, $hiddenPosition);

            return implode(' ', $progressionWithDots);
        },
        'calculateCorrectAnswer' => function ($question) use ($progression, $hiddenPosition) {
            if (isset($progression[$hiddenPosition])) {
                $hiddenNumber = $progression[$hiddenPosition];
                return strval($hiddenNumber);
            } else {
                // Обработка ситуации, когда скрытое число по указанной позиции отсутствует
            }
        }
    ];
}
