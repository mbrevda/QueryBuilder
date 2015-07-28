<?php

namespace Mbrevda\QueryBuilder;

use \Mbrevda\SpecificationQueryInterface\SpecificationQueryInterface;
use \Mbrevda\QueryBuilder\Connectives\AndX;
use \Mbrevda\QueryBuilder\Connectives\OrX;
use \Mbrevda\QueryBuilder\Connectives\Not;
use \Mbrevda\QueryBuilder\Operators\Equals;
use \Mbrevda\QueryBuilder\Operators\Unequal;

class CompositeQuery //implements SpecificationQueryInterface
{
    public function andX($specification1, $specification2)
    {
        return new AndX($specification1, $specification2);
    }

    public function orX($specification1, $specification2)
    {
        return new OrX($specification1, $specification2);
    }

    public function not($specifiction)
    {
        return new Not($specification);
    }

    public function equals($field, $value)
    {
        return new Equals($field, $value);
    }

    public function unequal($field, $value)
    {
        return new Unequal($field, $value);
    }

    public function selectSatisfying($spec)
    {
        return $this;
    }
    
    public function asSql($query)
    {
    }
}
