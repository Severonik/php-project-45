<?php

namespace PhpProject45\Games;

use PhpProject45\Game;

class EvenGame implements Game
{
    public function getType()
    {
        return 'even';
    }
    
    public function generateQuestion()
    {
        return mt_rand(1, 100);
    }

    public function calculateCorrectAnswer($question)
    {
        return $question % 2 === 0 ? 'yes' : 'no';
    }
}
