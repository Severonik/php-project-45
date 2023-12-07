<?php

namespace PhpProject45\Games;

use PhpProject45\Game;

class GcdGame implements Game {

    public function getType()
    {
        return 'gcd';
    }

    public function generateQuestion()
    {
        $number1 = mt_rand(1, 100);
        $number2 = mt_rand(1, 100);

        return "$number1 $number2";
    }

    public function calculateCorrectAnswer($question)
    {
        list($number1, $number2) = explode(' ', $question);
        return $this->gcd($number1, $number2);
    }

    private function gcd($a, $b)
    {
        while ($b !== 0) {
            $remainder = $a % $b;
            $a = $b;
            $b = $remainder;
        }

        return $a;
    }
}
