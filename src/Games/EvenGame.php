<?php

function evenGame()
{
    return [
        'question' => 'Answer "yes" if the number is even, otherwise answer "no".',
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
