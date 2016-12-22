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
    public static function toImmutable(DateTimeInterface $dateTime)
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

    /**
     * convert to Mutable (or nothing to do.)
     *
     * @param DateTimeInterface $dateTime
     *
     * @return DateTime
     */
    public function toMutable(DateTimeInterface $dateTime)
    {
        if ($dateTime instanceof DateTimeImmutable) {
            $fixed = new DateTime($dateTime->format('Y-m-d H:i:s'));
        } elseif ($dateTime instanceof DateTime) {
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