<?php

namespace PhpProject45;

use function cli\line;
use function cli\prompt;

class Cli
{
    public static function askName()
    {
        line('Welcome to the Brain Games!');
        return prompt('May I have your name?');
    }

    public static function welcome($name)
    {
        line("Hello, $name!");
    }

    public static function showGameInstructions()
    {
        if ($gameType === 'even') {
            self::showInstructionsEven();
        } elseif ($gameType === 'calc') {
            self::showInstructionsCalc();
        } else {
        }

    }

    public static function showInstructionsEven()
    {
        line('Answer "yes" if the number is even, otherwise answer "no".');
    }

    public static function showInstructionsCalc()
    {
        line('What is the result of the expression?');
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

    public static function showWrongAnswer($userAnswer, $correctAnswer)
    {
        line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
    }

    public static function showTryAgain($name)
    {
        line("Let's try again, $name!");
    }

    public static function showCongratulations($name)
    {
        line("Congratulations, $name!");
    }
}
