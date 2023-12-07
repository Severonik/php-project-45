<?php

namespace PhpProject45;

use function cli\line;
use function cli\prompt;

class Cli {

    public static function welcomeUser()
    {
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line("Hello, $name!");
        exit();
    }

    public static function askName()
    {
        line('Welcome to the Brain Games!');
        return prompt('May I have your name?');
    }

    public static function welcome(string $name)
    {
        line("Hello, $name!");
    }

    public static function showGameInstructions(string $gameType = '')
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

    public static function showQuestion($number)
    {
        line("Question: $number");
    }

    public static function askUserAnswer()
    {
        return prompt('Your answer');
    }

    public static function showCorrectAnswer()
    {
        line('Correct!');
    }

    public static function showWrongAnswer(string $userAnswer, string $correctAnswer)
    {
        line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
    }

    public static function showTryAgain(string $name)
    {
        line("Let's try again, $name!");
    }

    public static function showCongratulations(string $name)
    {
        line("Congratulations, $name!");
    }
}
