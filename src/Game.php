<?php

interface Game
{
    public function getType();
    public function generateQuestion();
    public function calculateCorrectAnswer(string $question);
}

// Добавим функции для работы с интерфейсом

function getTypeFunction(Game $game)
{
    return $game->getType();
}

function generateQuestionFunction(Game $game)
{
    return $game->generateQuestion();
}

function calculateCorrectAnswerFunction(Game $game, string $question)
{
    return $game->calculateCorrectAnswer($question);
}
