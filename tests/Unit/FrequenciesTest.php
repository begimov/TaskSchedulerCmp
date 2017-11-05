<?php

use PHPUnit\Framework\TestCase;
use App\Core\Event;
use Carbon\Carbon;
use App\Core\FrequenciesTrait;

class FrequenciesTest extends TestCase
{
    /** @test **/
    public function canSetPlainCronExpression()
    {
        $frequencies =  $this->getMockForTrait(FrequenciesTrait::class);
        $frequencies->setExpression('* * * * *');
        $frequencies->cron('23 12 * * 1');

        $this->assertEquals($frequencies->getExpression(), '23 12 * * 1');
    }
}
