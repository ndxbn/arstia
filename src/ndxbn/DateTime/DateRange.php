<?php

namespace ndxbn\DateTime;

use DateInterval;
use DatePeriod;
use DateTimeImmutable;
use DateTimeInterface;

/**
 * class DateRange is DatePeriod without
 * @author      suzuki_k
 * @copyright   Copyright (c) 2015  Phalanx Co., Ltd. (http://www.phalanx.co.jp/)
 */
class DateRange
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
     * @param int $recurrences
     *
     * @return DatePeriod
     */
    public function toDatePeriod(int $recurrences): DatePeriod
    {
        return new DatePeriod(
            $this->getStart(),
            $this->interval(),
            $this->getEnd()
        );
    }
}