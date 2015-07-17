<?php

namespace Mbrevda\QueryBuilder\Connectives;

use \Mbrevda\QueryBuilder\Query;

class OrX extends Query
{
    protected $specification1;
    protected $specification2;

    public function __construct($specification1, $specification2 = '')
    {
        $this->specification1 = $specification1->selectSatisfying($this);
        $this->specification2 = $specification2
            ? $specification2->selectSatisfying($this)
            : null;

        return $this;
    }

    public function toString()
    {
        $one = $this->specification1->toString();
        $two = $this->specification2
            ? $this->specification2->toString()
            : null;

        if ($one && $two) {
            return '(' . $one . ' OR ' . $two . ')';
        }

        return ' OR ' . $one;
    }
}
