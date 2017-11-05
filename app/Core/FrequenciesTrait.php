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
        return $this;
    }

    public function everyTenMinutes()
    {
        return $this->replaceInExpression(1, '*/10');
    }

    public function everyThirtyMinutes()
    {
        return $this->replaceInExpression(1, '*/30');
    }

    public function replaceInExpression($position, $values)
    {
        $expressionArr = explode(' ', $this->expression);

        array_splice($expressionArr, $position - 1, 
            count($values), (array)$values);

        $expressionArr = array_slice($expressionArr, 0, 5);
        
        return $this->cron(implode(' ', $expressionArr));
    }
}
