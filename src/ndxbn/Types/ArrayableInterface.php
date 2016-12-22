<?php

namespace ndxbn\Types;

/**
 * ArrayableInterface
 * @author      suzuki_k
 * @copyright   Copyright (c) 2015  Phalanx Co., Ltd. (http://www.phalanx.co.jp/)
 * @see ArrayableTrait
 */
interface ArrayableInterface
{
    /**
     *
     * @return array
     */
    public function toArray(): array;
}