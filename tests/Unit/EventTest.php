<?php

use PHPUnit\Framework\TestCase;
use App\Core\Event;
use Carbon\Carbon;

class EventTest extends TestCase
{
    /** @test **/
    public function eventHasDefaultCronExpression()
    {
        $event =  $this->getMockForAbstractClass(Event::class);

        $this->assertEquals($event->getExpression(), '* * * * *');
    }

    /** @test **/
    public function eventShouldRun()
    {
        $event =  $this->getMockForAbstractClass(Event::class);

        $this->assertTrue($event->isDueToRun(Carbon::now()));
    }

    /** @test **/
    public function eventShouldNotRun()
    {
        $event =  $this->getMockForAbstractClass(Event::class);
        $event->setExpression('0 0 1 * *');

        $this->assertFalse($event->isDueToRun(Carbon::create(1980, 5, 3)));
    }
}
