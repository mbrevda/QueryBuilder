<?php

namespace Mbrevda\QueryBuilder\Connectives;

use \Mbrevda\QueryBuilder\CompositeQuery;

class AndX extends CompositeQuery
{
    protected $specs;

    public function __construct($specs)
    {
        $this->specs = $specs;
    }

    public function asSql($query)
    {
        /*return implode(' AND ', array_map(function($spec) use ($query){
            print_r(['andX asSql' => $query]);
            $rv = $spec->asSql($query);
            print_r(['rv' => $rv]);
            return $rv;
        }, $this->specs));*/
        $and = [];
        foreach ($this->specs as $spec) {
            $and[] = $spec->asSql($query);
        }
        return implode(' AND ', $and);
        /*$one = $this->specification1->asSql($query);
        $two = $this->specification2
            ? $this->specification2->asSql($query)
            : null;

        if ($one && $two) {
            return '(' . $one . ' AND ' . $two . ')';
        }

        if ($one || $two) {
            return  ($one ? $one : $two);
        }*/
    }
}
