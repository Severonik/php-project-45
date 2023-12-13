<?php

function getTypeFunction(array $game)
{
    return $game['type'];
}

function generateQuestionFunction(array $game)
{
    return $game['generateQuestion']();
}

function calculateCorrectAnswerFunction(array $game, string $question)
{
    return $game['calculateCorrectAnswer']($question);
}
