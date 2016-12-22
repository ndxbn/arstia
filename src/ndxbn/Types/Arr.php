<?php

namespace ndxbn\Types;

use ArrayAccess;

/**
 * class ArrayAccessAbstract is Template
 * @author      suzuki_k
 * @copyright   Copyright (c) 2015  Phalanx Co., Ltd. (http://www.phalanx.co.jp/)
 */
class Arr implements ArrayAccess, ArrayableInterface
{
    use ArrayAccessTrait;
    use ArrayableTrait;

    public static function createFromArray(array $from): Arr
    {
        $instance = new static();
        return $instance->setData($from);
    }
}