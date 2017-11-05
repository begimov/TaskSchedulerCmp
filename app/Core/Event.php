<?php

namespace App\Core;

use Cron\CronExpression;
use Carbon\Carbon;

abstract class Event
{
    protected $expression = '* * * * *';

    public function getExpression()
    {
        return $this->expression;
    }

    abstract public function handle();

    public function isDueToRun(Carbon $date)
    {
        return CronExpression::factory($this->expression)->isDue($date);
    }
}
