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

    public function isDueToRun()
    {
        return CronExpression::factory($this->expression)->isDue(Carbon::now());
    }
}
