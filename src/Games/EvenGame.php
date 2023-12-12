<?php

function evenGame()
{
    return [
        'type' => 'even',
        'generateQuestion' => function () {
            $question = mt_rand(1, 100);
            return "Question: $question";
        },
        'calculateCorrectAnswer' => function ($question) {
            return $question % 2 === 0 ? 'yes' : 'no';
        }
    ];
}