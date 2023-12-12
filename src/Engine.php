<?php

require_once __DIR__ . '/../src/Cli.php';
require_once __DIR__ . '/../src/Game.php';

use function cli\line;
use function cli\prompt;

function runGame($game)
{
    $name = askName();
    welcome($name);

    $correctAnswersCount = 0;
    $maxCorrectAnswers = 3;

    while ($correctAnswersCount < $maxCorrectAnswers) {
        $questionData = generateQuestionFunction($game);
        $correctAnswer = calculateCorrectAnswerFunction($game, $questionData);

        showGameInstructions(getTypeFunction($game));
        showQuestion($questionData);
        $userAnswer = askUserAnswer();

        if ($userAnswer == $correctAnswer) {
            showCorrectAnswer($correctAnswer);
            $correctAnswersCount++;
        } else {
            showWrongAnswer($userAnswer, $correctAnswer);
            showTryAgain($name);
            return;
        }
    }

    showCongratulations($name);
}
