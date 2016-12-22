<?php

namespace ndxbn\DateTime;

use DateInterval;
use DatePeriod;
use IteratorAggregate;

/**
 * class DateRange is daily iteration `DatePeriod` class
 * @author      suzuki_k
 * @copyright   Copyright (c) 2015  Phalanx Co., Ltd. (http://www.phalanx.co.jp/)
 */
class DateRange implements DateRangeInterface, IteratorAggregate
{
    use DateRangeTrait;

    /**
     * Retrieve an external iterator
     * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new DatePeriod(
            $this->getStart(),
            new DateInterval('P1D'),
            $this->getEnd()
        );
    }
}