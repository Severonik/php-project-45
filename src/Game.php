<?php

function getTypeFunction(string $game): string
{
    return $game['type'];
}

function generateQuestionFunction(string $game): string
{
    return $game['generateQuestion']();
}

function calculateCorrectAnswerFunction(string $game, string $question)
{
    return $game['calculateCorrectAnswer']($question);
}
