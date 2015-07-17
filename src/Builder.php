<?php

namespace Mbrevda\QueryBuilder;

use \Mbrevda\QueryBuilder\Query;

class Builder
{
    
    public function __construct($sqlquery)
    {
        $this->sqlquery = $sqlquery;
    }

    public function build($query)
    {
        return $this->sqlquery->where($query->toString());
    }
}
