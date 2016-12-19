<?php

namespace ndxbn\DateTime;

interface DateRangeInterface
{
    public function __construct(\DateTimeInterface $start, \DateTimeInterface $end);

    public function getStart(): \DateTimeImmutable;

    public function getEnd(): \DateTimeImmutable;

    public function interval(): \DateInterval;
}