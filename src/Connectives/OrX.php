<?php

namespace Mbrevda\QueryBuilder\Connectives;

use \Mbrevda\QueryBuilder\CompositeQuery;

class OrX extends CompositeQuery
{
    protected $specs;
    public $isTop = false;
    public function __construct($specs)
    {
        $this->specs = $specs;
    }


    public function asSql($query)
    {
        return implode(' OR ', array_map(function($spec) use ($query){
            return $spec->asSql($query);
        }, $this->specs));
        /*$one = $this->specification1->asSql($query);
        $two = $this->specification2
            ? $this->specification2->asSql($query)
            : null;

        if ($one && $two) {
            return '(' . $one . ' OR ' . $two . ')';
        }

        return ' OR ' . $one;*/
    }
}
