<?php

namespace PhpProject45;

class Game
{
    public static function run()
    {
        $name = Cli::askName();
        Cli::welcome($name);
        Cli::showGameInstructions();

        $correctAnswersCount = 0;
        $maxCorrectAnswers = 3;

        while ($correctAnswersCount < $maxCorrectAnswers) {
            $number = mt_rand(1, 100);
            $correctAnswer = self::isEven($number) ? 'yes' : 'no';

            Cli::showQuestion($number);
            $userAnswer = Cli::askUserAnswer();

            if ($userAnswer === $correctAnswer) {
                Cli::showCorrectAnswer();
                $correctAnswersCount++;
            } else {
                Cli::showWrongAnswer($userAnswer, $correctAnswer);
                Cli::showTryAgain($name);
                return;
            }
        }

        Cli::showCongratulations($name);
    }

    private static function isEven($number)
    {
        return $number % 2 === 0;
    }
}
