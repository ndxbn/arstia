<?php

namespace ndxbn\DateTime;

use DateTime;
use DateTimeImmutable;

class DateTimeUtilityTest extends \PHPUnit_Framework_TestCase
{
    public function testFixToImmutableWithMutable()
    {
        $mutable = new DateTime();
        $fixed = DateTimeUtility::toImmutable($mutable);

        $this->assertInstanceOf(DateTimeImmutable::class, $fixed);

        $this->assertSame(
            $mutable->getTimestamp(),
            $fixed->getTimestamp()
        );
    }

    public function testFixToImmutableWithImmutable()
    {
        $immutable = new DateTimeImmutable();
        $fixed = DateTimeUtility::toImmutable($immutable);

        $this->assertInstanceOf(DateTimeImmutable::class, $fixed);

        $this->assertSame(
            $immutable->getTimestamp(),
            $fixed->getTimestamp()
        );
    }
}
