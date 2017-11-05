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

    public function replaceInExpression($position, $values)
    {
        $expressionArr = explode(' ', $this->expression);

        array_splice($expressionArr, $position - 1, 
            count($values), (array)$values);

        array_slice($expressionArr, 0, 5);
        
        return $this->cron(implode(' ', $expressionArr));
    }
}
