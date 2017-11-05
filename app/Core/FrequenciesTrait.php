<?php

namespace App\Core;

trait FrequenciesTrait
{
    public function cron($expression)
    {
        $this->expression = $expression;
        return $this;
    }

    public function everyMinute()
    {
        $this->expression = '* * * * *';
        return $this;
    }

    public function everyTenMinutes()
    {
        $this->expression = '*/10 * * * *';
        return $this;
    }

    public function everyThirtyMinutes()
    {
        $this->expression = '*/30 * * * *';
        return $this;
    }

    public function replaceInExpression($position, $value)
    {
        $expressionArr = explode(' ', $this->expression);
        $expressionArr[$position - 1] = $value;
        return $this->cron(implode(' ', $expressionArr));
    }
}
