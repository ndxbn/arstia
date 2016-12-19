<?php

namespace ndxbn\DateTime;

use DateInterval;
use DatePeriod;
use DateTimeImmutable;
use DateTimeInterface;

trait DateRangeTrait
{
    /** @var DateTimeImmutable */
    private $start;
    /** @var DateTimeImmutable */
    private $end;

    /**
     * DateRange constructor.
     *
     * @param DateTimeInterface $start
     * @param DateTimeInterface $end
     */
    public function __construct(DateTimeInterface $start, DateTimeInterface $end)
    {
        $this->start = DateTimeUtility::fixToImmutable($start);
        $this->end = DateTimeUtility::fixToImmutable($end);
    }

    /**
     * @return DateTimeImmutable
     */
    public function getStart(): DateTimeImmutable
    {
        return $this->start;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getEnd(): DateTimeImmutable
    {
        return $this->end;
    }

    /**
     * @return DateInterval
     */
    public function interval(): DateInterval
    {
        return $this->getEnd()->diff($this->getStart());
    }

    /**
     * @return DatePeriod
     */
    public function toDatePeriod(): DatePeriod
    {
        return new DatePeriod(
            $this->getStart(),
            $this->interval(),
            $this->getEnd()
        );
    }
}