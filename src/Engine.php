<?php

use function cli\line;
use function cli\prompt;

const MAX_CORRECT_ANSWERS = 3;

function runGame(array $game)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    $correctAnswersCount = 0;

    while ($correctAnswersCount < MAX_CORRECT_ANSWERS) {
        $question = $game['generateQuestion']();
        $correctAnswer = $game['calculateCorrectAnswer']($question);

        $game['question']();
        line("Question: {$question}");
        $userAnswer = prompt('Your answer');

        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $correctAnswersCount++;
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }
    }

    line("Congratulations, $name!");
}
