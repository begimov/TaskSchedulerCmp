<?php

namespace App\Core;

abstract class Event
{
    protected $expression = '* * * * *';

    public function getExpression()
    {
        return $this->expression;
    }
}
