<?php

namespace ndxbn\DateTime;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;

class DateTimeUtility
{

    /**
     * convert to Immutable (or nothing to do.)
     *
     * @param DateTimeInterface $dateTime
     *
     * @return DateTimeImmutable
     */
    public static function fixToImmutable(DateTimeInterface $dateTime)
    {
        if ($dateTime instanceof DateTime) {
            $fixed = DateTimeImmutable::createFromMutable($dateTime);
        } elseif ($dateTime instanceof DateTimeImmutable) {
            $fixed = $dateTime;
        } else {
            /**
             * The instance of DateTimeInterface is either DateTime or DateTimeImmutable.
             * @link http://jp2.php.net/manual/en/class.datetimeinterface.php
             */
            throw new \LogicException('incompatible PHP version.');
        }
        return $fixed;
    }
}