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
        $frequencies = $this->setUpFrequencies();
        $frequencies->cron('23 12 * * 1');

        $this->assertEquals($frequencies->expression, '23 12 * * 1');
    }

    protected function setUpFrequencies()
    {
        $frequencies =  $this->getMockForTrait(FrequenciesTrait::class);
        $frequencies->expression = '* * * * *';
        return $frequencies;
    }
}
