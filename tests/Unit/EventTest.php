<?php

use PHPUnit\Framework\TestCase;
use App\Core\Event;

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

        $this->assertTrue($event->isDueToRun());
    }
}
