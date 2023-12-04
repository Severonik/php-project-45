<?php

namespace PhpProject45;

use function cli\line;
use function cli\prompt;

class Cli
{
    public static function run()
    {
        self::welcome();
        $name = self::askName();
        self::greetUser($name);
    }

    private static function welcome()
    {
        line('Welcome to the Brain Game!');
    }

    private static function askName()
    {
        return prompt('May I have your name?');
    }

    private static function greetUser($name)
    {
        line("Hello, %s!", $name);
    }
}