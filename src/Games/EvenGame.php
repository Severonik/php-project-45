<?php

function evenGame()
{
    return [
        'type' => 'even',
        'generateQuestion' => function () {
            $question = mt_rand(1, 100);
            return $question;
        },
        'calculateCorrectAnswer' => function ($question) {
            $question = (int)$question;
            return $question % 2 === 0 ? 'yes' : 'no';
        }
    ];
}