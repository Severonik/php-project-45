<?php

namespace PhpProject45\Games;

use PhpProject45\Game;

class PrimeGame implements Game {

    public function getType()
    {
        return 'prime';
    }

    public function generateQuestion()
    {
        return mt_rand(1, 100);
    }

    public function calculateCorrectAnswer($question)
    {
        return $this->isPrime($question) ? 'yes' : 'no';
    }

    private function isPrime($number)
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
}
