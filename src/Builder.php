<?php

namespace Mbrevda\QueryBuilder;

use \Mbrevda\QueryBuilder\CompositeQuery;

class Builder
{
    
    public function __construct($sqlquery)
    {
        $this->sqlquery = $sqlquery;
        $this->query = new CompositeQuery;
    }

    public function build($query)
    {
        return $this->sqlquery->where($query->toString());
    }

    public function getQuery()
    {
        return $this->query;
    }
}
