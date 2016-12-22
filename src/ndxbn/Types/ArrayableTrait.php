<?php

namespace ndxbn\Types;

/**
 * ArrayableTrait
 * @author      suzuki_k
 * @copyright   Copyright (c) 2015  Phalanx Co., Ltd. (http://www.phalanx.co.jp/)
 * @see ArrayableInterface
 */
trait ArrayableTrait
{
    abstract protected function getData(): array;

    public function toArray(): array
    {
        return $this->getData();
    }
}