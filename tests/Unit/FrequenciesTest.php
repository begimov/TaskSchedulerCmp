<?php

use PHPUnit\Framework\TestCase;
use App\Core\Event;
use Carbon\Carbon;
use App\Core\FrequenciesTrait;

class FrequenciesTest extends TestCase
{
    /** @test **/
    public function canReplaceInExpression()
    {
        $frequencies = $this->setUpFrequencies();
        $frequencies->replaceInExpression(1, '*/5')
            ->replaceInExpression(1, '*/10');

        $this->assertEquals($frequencies->expression, '*/10 * * * *');
    }

    /** @test **/
    public function canSetPlainCronExpression()
    {
        $frequencies = $this->setUpFrequencies();
        $frequencies->cron('23 12 * * 1');

        $this->assertEquals($frequencies->expression, '23 12 * * 1');
    }

    /** @test **/
    public function canSetEveryMinute()
    {
        $frequencies = $this->setUpFrequencies();
        $frequencies->everyMinute();

        $this->assertEquals($frequencies->expression, '* * * * *');
    }

    /** @test **/
    public function canSetEveryTenMinutes()
    {
        $frequencies = $this->setUpFrequencies();
        $frequencies->everyTenMinutes();

        $this->assertEquals($frequencies->expression, '*/10 * * * *');
    }

    /** @test **/
    public function canSetEveryThirtyMinutes()
    {
        $frequencies = $this->setUpFrequencies();
        $frequencies->everyThirtyMinutes();

        $this->assertEquals($frequencies->expression, '*/30 * * * *');
    }

    protected function setUpFrequencies()
    {
        $frequencies =  $this->getMockForTrait(FrequenciesTrait::class);
        $frequencies->expression = '* * * * *';
        return $frequencies;
    }
}
