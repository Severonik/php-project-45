<?php

require_once __DIR__ . '/../src/Cli.php';
require_once __DIR__ . '/../src/Game.php';

use function cli\line;
use function cli\prompt;

function runGame(array $game)
{
    $name = askName();
    welcome($name);

    $correctAnswersCount = 0;
    $maxCorrectAnswers = 3;

    while ($correctAnswersCount < $maxCorrectAnswers) {
        $question = generateQuestionFunction($game);
        $correctAnswer = calculateCorrectAnswerFunction($game, $question);

        showGameInstructions(getTypeFunction($game));
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
