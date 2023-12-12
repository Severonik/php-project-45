<?php

require_once __DIR__ . '/../src/Cli.php';
require_once __DIR__ . '/../src/Game.php';

function runGame(callable $game)
{
    $name = askName();
    welcome($name);

    $correctAnswersCount = 0;
    $maxCorrectAnswers = 3;

    while ($correctAnswersCount < $maxCorrectAnswers) {
        $question = $game['question']();
        $correctAnswer = $game['correctAnswer']($question);

        showGameInstructions($game['type']);
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
