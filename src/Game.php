<?php

function getTypeFunction(array $game): string
{
    return $game['type'] ?? 'unknown';
}

function generateQuestionFunction(array $game): string
{
    return isset($game['generateQuestion']) && is_callable($game['generateQuestion'])
        ? $game['generateQuestion']()
        : 'No valid question generator';
}

function calculateCorrectAnswerFunction(array $game, string $question)
{
    return isset($game['calculateCorrectAnswer']) && is_callable($game['calculateCorrectAnswer'])
        ? $game['calculateCorrectAnswer']($question)
        : null;
}
