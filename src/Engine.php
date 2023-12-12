<?php

namespace PhpProject45\Engine;

use function PhpProject45\Cli\askName;
use function PhpProject45\Cli\welcome;
use function PhpProject45\Cli\showGameInstructions;
use function PhpProject45\Cli\showQuestion;
use function PhpProject45\Cli\askUserAnswer;
use function PhpProject45\Cli\showCorrectAnswer;
use function PhpProject45\Cli\showWrongAnswer;
use function PhpProject45\Cli\showTryAgain;
use function PhpProject45\Cli\showCongratulations;

use function PhpProject45\Games\generateQuestion;
use function PhpProject45\Games\calculateCorrectAnswer;

function runGame(callable $game)
{
    $name = askName();
    welcome($name);

    $correctAnswersCount = 0;
    $maxCorrectAnswers = 3;

    while ($correctAnswersCount < $maxCorrectAnswers) {
        $question = generateQuestion($game);
        $correctAnswer = calculateCorrectAnswer($game, $question);

        showGameInstructions($game);
        showQuestion($question);
        $userAnswer = askUserAnswer();

        if ($userAnswer == $correctAnswer) {
            showCorrectAnswer();
            $correctAnswersCount++;
        } else {
            showWrongAnswer($userAnswer, $correctAnswer);
            showTryAgain($name);
            return;
        }
    }

    showCongratulations($name);
}
