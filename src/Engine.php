<?php

use function cli\line;
use function cli\prompt;

const MAX_CORRECT_ANSWERS = 3;

function showGameInstructions(string $gameType = '')
{
    switch ($gameType) {
        case 'even':
            line('Answer "yes" if the number is even, otherwise answer "no".');
            break;
        case 'calc':
            line('What is the result of the expression?');
            break;
        case 'gcd':
            line('Find the greatest common divisor of given numbers.');
            break;
        case 'progression':
            line('What number is missing in the progression?');
            break;
        case 'prime':
            line('Answer "yes" if given number is prime. Otherwise answer "no".');
            break;
    }
}

function runGame(array $game)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    $correctAnswersCount = 0;

    while ($correctAnswersCount < MAX_CORRECT_ANSWERS) {
        $question = $game['generateQuestion']();
        $correctAnswer = $game['calculateCorrectAnswer']($question);

        showGameInstructions($game['type']);
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
