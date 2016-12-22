<?php

namespace ndxbn\DateTime;

class DateRangeTest extends \PHPUnit_Framework_TestCase
{
    public function testInterfaceMethods()
    {
        $startAt = new \DateTimeImmutable('2000/12/10 12:34:56');
        $endAt = new \DateTimeImmutable('2000/12/16 12:34:56');
        $dateRange = new DateRange($startAt, $endAt);

        $this->assertInstanceOf(\DateTimeInterface::class, $dateRange->getStart());
        $this->assertEquals($startAt, $dateRange->getStart());

        $this->assertInstanceOf(\DateTimeInterface::class, $dateRange->getEnd());
        $this->assertEquals($endAt, $dateRange->getEnd());

        $this->assertInstanceOf(\DateInterval::class, $dateRange->interval());
        $this->assertSame(6, $dateRange->interval()->days);

        // once iterator
        $this->assertInstanceOf(\DatePeriod::class, $dateRange->toDatePeriod());
        $counter = 0;
        foreach ($dateRange->toDatePeriod() as $item) {
            $this->assertInstanceOf(\DateTimeInterface::class, $item);
            $counter++;
        }
        $this->assertLessThanOrEqual(1, $counter);
    }

    public function testIterationWithForeach()
    {
        $startAt = new \DateTimeImmutable('2000/01/01 11:00:00');
        $endAt = new \DateTimeImmutable('2000/12/16 11:00:00');
        $dateRange = new DateRange($startAt, $endAt);

        // this will cursor
        $expect = new \DateTime('2000/01/01 11:00:00');

        // each days iterator
        // ATTENTION: NOT SAME `toDatePeriod` method.
        foreach ($dateRange as $datetime) {
            $this->assertEquals($expect, $datetime);
            $expect->add(new \DateInterval('P1D'));
        }
    }
}
