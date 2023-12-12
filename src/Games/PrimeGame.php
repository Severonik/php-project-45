<?php

function primeGame()
{
    return [
        'type' => 'prime',
        'generateQuestion' => function () {
            return mt_rand(1, 100);
        },
        'calculateCorrectAnswer' => function ($question) {
            return isPrime($question) ? 'yes' : 'no';
        }
    ];
}
