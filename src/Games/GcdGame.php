<?php

use PhpProject45\Game;

function gcd($a, $b)
{
    while ($b !== 0) {
        $remainder = $a % $b;
        $a = $b;
        $b = $remainder;
    }

    return $a;
}

class GcdGame implements Game
{
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
        return gcd($number1, $number2);
    }
}
