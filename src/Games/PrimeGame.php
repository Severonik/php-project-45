<?php

function isPrime(int $number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function primeGame()
{
    return [
        'question' => 'Answer "yes" if given number is prime. Otherwise answer "no".',
        'generateQuestion' => function () {
            return mt_rand(1, 100);
        },
        'calculateCorrectAnswer' => function ($question) {
            return isPrime($question) ? 'yes' : 'no';
        }
    ];
}
