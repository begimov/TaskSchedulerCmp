<?php

namespace App\Core;

abstract class Event
{
    protected $expression = '* * * * *';

    public function getExpression()
    {
        return $this->expression;
    }

    abstract public function handle();

    public function isDueToRun()
    {
        return true;
    }
}
