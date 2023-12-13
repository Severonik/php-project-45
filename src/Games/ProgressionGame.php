<?php

function progressionGame()
{


        function getType()
        {
            return 'progression';
        }

        function generateQuestion()
        {
            $this->progression = generateProgression();
            $this->hiddenPosition = mt_rand(0, count($this->progression) - 1);

            $progressionWithDots = replaceWithDots($this->progression, $this->hiddenPosition);

            return implode(' ', $progressionWithDots);
        }

        function calculateCorrectAnswer($question)
        {
            $progression = $this->progression;
            $hiddenNumber = $progression[$this->hiddenPosition];

            return $hiddenNumber;
        }

        function generateProgression()
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

        function replaceWithDots($progression, $position)
        {
            $progressionWithDots = $progression;
            $progressionWithDots[$position] = '..';

            return $progressionWithDots;
        }
}
