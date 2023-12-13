<?php

function progressionGame()
{
    return new class implements Game {
        private $progression;
        private $hiddenPosition;

        public function getType()
        {
            return 'progression';
        }

        public function generateQuestion()
        {
            $this->progression = generateProgression();
            $this->hiddenPosition = mt_rand(0, count($this->progression) - 1);

            $progressionWithDots = replaceWithDots($this->progression, $this->hiddenPosition);

            return implode(' ', $progressionWithDots);
        }

        public function calculateCorrectAnswer($question)
        {
            $progression = $this->progression;
            $hiddenNumber = $progression[$this->hiddenPosition];

            return $hiddenNumber;
        }

        private function generateProgression()
        {
            $length = mt_rand(5, 10);
            $start = mt_rand(1, 20);
            $step = mt_rand(1, 5);

            $progression = [$start];

            for ($i = 1; $i < $length; $i++) {
                $progression[] = $start + $i * $step;
            }

            return $progression;
        }

        private function replaceWithDots($progression, $position)
        {
            $progressionWithDots = $progression;
            $progressionWithDots[$position] = '..';

            return $progressionWithDots;
        }
    };
}
