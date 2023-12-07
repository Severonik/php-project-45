<?php

namespace PhpProject45;

interface Game {
    public function getType();
    public function generateQuestion();
    public function calculateCorrectAnswer(string $question);
}
