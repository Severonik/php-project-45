<?php

namespace PhpProject45;

interface Game
{
    public function generateQuestion();
    public function calculateCorrectAnswer($question);
}
