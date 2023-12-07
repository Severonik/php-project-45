<?php

namespace PhpProject45;

use function cli\line;
use function cli\prompt;

class Engine
{
    public static function runGame(Game $game)
    {
        $name = Cli::askName();
        Cli::welcome($name);

        $correctAnswersCount = 0;
        $maxCorrectAnswers = 3;

        while ($correctAnswersCount < $maxCorrectAnswers) {
            $question = $game->generateQuestion();
            $correctAnswer = $game->calculateCorrectAnswer($question);

            Cli::showGameInstructions($game->getType());
            Cli::showQuestion($question);
            $userAnswer = Cli::askUserAnswer();

            if ($userAnswer == $correctAnswer) {
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
}
