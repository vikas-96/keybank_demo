<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function firstname($firstname)
    {
        return $this->where('firstname', 'LIKE', '%'.$firstname.'%');
    }

    public function lastname($lastname)
    {
        return $this->where('lastname', 'LIKE', '%'.$lastname.'%');
    }

    public function email($email)
    {
        return $this->where('email', 'LIKE', '%'.$email.'%');
    }

    public function contactNumber($contact_number)
    {
        return $this->where('contact_number', 'LIKE', '%'.$contact_number.'%');
    }

    public function isActive($is_active)
    {
        return $this->where('is_active', filter_var($is_active, FILTER_VALIDATE_BOOLEAN));
    }
}
