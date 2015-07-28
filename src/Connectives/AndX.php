<?php

namespace Mbrevda\QueryBuilder\Connectives;

use \Mbrevda\QueryBuilder\CompositeQuery;

class AndX extends CompositeQuery
{
    protected $specification1;
    protected $specification2;

    public function __construct($specification1, $specification2)
    {
        $this->specification1 = $specification1->selectSatisfying($this);
        $this->specification2 = $specification2->selectSatisfying($this);

        return $this;
    }

    public function asSql($query)
    {
        $one = $this->specification1->asSql($query);
        $two = $this->specification2
            ? $this->specification2->asSql($query)
            : null;

        if ($one && $two) {
            return '(' . $one . ' AND ' . $two . ')';
        }

        if ($one || $two) {
            return  ($one ? $one : $two);
        }
    }
}
