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
    private $children = [];

    public function andX($specs)
    {
        return $this->children[] = new AndX($specs);
    }

    public function orX($specs)
    {
        return $this->children[] = new OrX($specs);
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
        return $spec;
    }

    public function asSql($query)
    {
        /*$where = implode(' AND ', array_map(function($child) use ($query){
            return $child->asSql($query);
        }, $this->children));*/

        $and = [];
        foreach ($this->children as $child) {
            $and[] = $child->asSql($query);
        }

        $query->where(implode(' AND ', $and));
    }
}
