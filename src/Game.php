<?php

function getTypeFunction(array  $game): string
{
    return $game['type'];
}

function generateQuestionFunction(array  $game): string
{
    return $game['generateQuestion']();
}

function calculateCorrectAnswerFunction(string $game, string $question)
{
    return $game['calculateCorrectAnswer']($question);
}
