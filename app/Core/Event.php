<?php

namespace App\Core;

use Cron\CronExpression;
use Carbon\Carbon;
use App\Core\FrequenciesTrait;

abstract class Event
{
    use FrequenciesTrait;

    protected $expression = '* * * * *';

    abstract public function handle();

    public function getExpression()
    {
        return $this->expression;
    }

    public function isDueToRun(Carbon $date)
    {
        return CronExpression::factory($this->expression)->isDue($date);
    }
}
