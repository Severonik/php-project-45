<?php

use function cli\line;
use function cli\prompt;

function welcomeUser()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    exit();
}

function askName()
{
    line('Welcome to the Brain Games!');
    return prompt('May I have your name?');
}

function welcome(string $name)
{
    line("Hello, $name!");
}

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

function showQuestion(string $question)
{
    line("Question: {$question}");
}

function askUserAnswer()
{
    return prompt('Your answer');
}

function showCorrectAnswer()
{
    line('Correct!');
}

function showWrongAnswer(string $userAnswer, string $correctAnswer)
{
    line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
}

function showTryAgain(string $name)
{
    line("Let's try again, $name!");
}

function showCongratulations(string $name)
{
    line("Congratulations, $name!");
}
