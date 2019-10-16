<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class BorrowerFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function name($name)
    {
        return $this->where('name', 'LIKE', '%'.$name.'%');
    }

    public function CIF($CIF)
    {
        return $this->where('CIF', 'LIKE', '%'.$CIF.'%');
    }

    public function isActive($is_active)
    {
        return $this->where('is_active', filter_var($is_active, FILTER_VALIDATE_BOOLEAN));
    }
}
