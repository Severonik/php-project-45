<?php

namespace PhpProject45\Games;

use PhpProject45\Game;

class CalcGame implements Game {

    public function getType() {
        return 'calc';
    }

    public function generateQuestion() {
        $number1 = mt_rand(1, 100);
        $number2 = mt_rand(1, 100);
        $operation = ['+', '-', '*'][array_rand(['+', '-', '*'])];

        return "$number1 $operation $number2";
    }

    public function calculateCorrectAnswer($question) {
        eval('$result = ' . $question . ';');
        return $result;
    }
}
