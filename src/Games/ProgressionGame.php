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
    $gameData = generateQuestion();

    return [
        'type' => 'progression',
        'question' => $gameData['question'],
        'correctAnswer' => $gameData['correctAnswer'],
        'checkAnswer' => function ($userAnswer) use ($gameData) {
            checkAnswer($userAnswer, $gameData['correctAnswer']);
        },
    ];
}

function generateQuestion()
{
    $progression = generateProgression();
    $hiddenPosition = mt_rand(0, count($progression) - 1);

    $progressionWithDots = replaceWithDots($progression, $hiddenPosition);

    $question = implode(' ', $progressionWithDots);
    $correctAnswer = strval($progression[$hiddenPosition]);

    return [
        'question' => $question,
        'correctAnswer' => $correctAnswer,
    ];
}

function checkAnswer($userAnswer, $correctAnswer)
{
    if ($userAnswer === $correctAnswer) {
        print("Correct!\n");
    } else {
        print("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.\n");
    }
}