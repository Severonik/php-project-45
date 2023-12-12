<?php

require_once __DIR__ . '/../src/Cli.php';
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
