<?php

function getTypeFunction($game)
{
    return $game['type'];
}

function generateQuestionFunction($game)
{
    return $game['generateQuestion']();
}

function calculateCorrectAnswerFunction($game, $question)
{
    return $game['calculateCorrectAnswer']($question);
}
