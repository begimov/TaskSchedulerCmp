<?php

namespace App\Core;

trait FrequenciesTrait
{
    public function cron($expression)
    {
        $this->expression = $expression;
    }

    public function everyMinute()
    {
        $this->expression = '* * * * *';
    }
}
