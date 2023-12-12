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
    $length = mt_rand(5, 10); // Установка значения для $length
    $hiddenPosition = mt_rand(0, $length - 1);

    return [
        'type' => 'progression',
        'generateQuestion' => function () use ($length, $hiddenPosition) {
            $progression = generateProgression();

            $progressionWithDots = replaceWithDots($progression, $hiddenPosition);

            $question = '';
            foreach ($progressionWithDots as $index => $number) {
                $question .= ($index === $hiddenPosition) ? '.. ' : "$number ";
            }

            return [
                'question' => trim($question),
                'hiddenPosition' => $hiddenPosition,
            ];
        },
        'calculateCorrectAnswer' => function ($questionData) {
            $progression = $questionData['question'];
            $hiddenNumber = $progression[$questionData['hiddenPosition']];

            return $hiddenNumber;
        }
    ];
}
