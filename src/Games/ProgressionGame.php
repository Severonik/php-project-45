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

function replaceWithDots(array $progression, int $position): array
{
    $progressionWithDots = $progression;
    $progressionWithDots[$position] = '..';

    return $progressionWithDots;
}

function progressionGame(): array
{
    return [
        'type' => 'progression',
        'generateQuestion' => function (): string {
            global $progression, $hiddenPosition;

            $progression = generateProgression();
            $hiddenPosition = mt_rand(0, count($progression) - 1);

            $progressionWithDots = replaceWithDots($progression, $hiddenPosition);

            return implode(' ', $progressionWithDots);
        },
        'calculateCorrectAnswer' => function ($question): int {
            global $progression, $hiddenPosition;

            $hiddenNumber = $progression[$hiddenPosition];

            return $hiddenNumber;
        }
    ];
}
