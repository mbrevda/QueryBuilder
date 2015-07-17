<?php

namespace Mbrevda\QueryBuilder\Operators;

use \Mbrevda\QueryBuilder\Query;

class Unequal extends Query
{
    protected $field;
    protected $value;

    public function __construct($field, $value)
    {
        $this->field = $field;
        $this->value = $value;

        return $this;
    }

    public function toString()
    {
        return $this->field . ' <> ' . $this->value;
    }
}
