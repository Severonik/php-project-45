<?php

function getTypeFunction(array $game): string
{
    return $game['type'];
}

function generateQuestionFunction(array $game): string
{
    return $game['generateQuestion']();
}

function calculateCorrectAnswerFunction(array $game, string $question)
{
    return $game['calculateCorrectAnswer'](extractQuestionData($question));
}

function extractQuestionData(string $question): array
{
    // Разбираем вопрос и извлекаем необходимые данные
    // Например, если вопрос "2 5", извлекаем [2, 5]
    $questionData = array_map('intval', explode(' ', $question));

    return $questionData;
}