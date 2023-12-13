<?php

function getTypeFunction(string $game)
{
    return $game['type'];
}

function generateQuestionFunction(string $game)
{
    return $game['generateQuestion']();
}

function calculateCorrectAnswerFunction(string $game, string $question)
{
    return $game['calculateCorrectAnswer']($question);
}
