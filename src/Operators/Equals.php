<?php

namespace Mbrevda\QueryBuilder\Operators;

use \Mbrevda\QueryBuilder\CompositeQuery;

class Equals extends CompositeQuery
{
    protected $field;
    protected $value;

    public function __construct($field, $value)
    {
        $this->field = $field;
        $this->value = $value;

        return $this;
    }

    public function asSql($query)
    {
        return $this->field . ' = ' . $this->value;
    }
}
