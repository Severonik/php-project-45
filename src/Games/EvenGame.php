<?php

function evenGame()
{
    return [
        'type' => 'even',
        'generateQuestion' => function () {
            return mt_rand(1, 100);
        },
        'calculateCorrectAnswer' => function ($question) {
            return $question % 2 === 0 ? 'yes' : 'no';
        }
    ];
}
