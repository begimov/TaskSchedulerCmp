<?php

namespace App\Core;

use Cron\CronExpression;
use Carbon\Carbon;

abstract class Event
{
    protected $expression = '* * * * *';

    abstract public function handle();

    public function getExpression()
    {
        return $this->expression;
    }

    public function setExpression($expression)
    {
        $this->expression = $expression;
    }

    public function isDueToRun(Carbon $date)
    {
        return CronExpression::factory($this->expression)->isDue($date);
    }
}
