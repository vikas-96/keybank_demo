<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class LoanFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function accountNo($account_no)
    {
        return $this->where('account_no', 'LIKE', '%'.$account_no.'%');
    }

    public function bankingArrangement($banking_arrangement)
    {
        return $this->where('banking_arrangement', 'LIKE', '%'.$banking_arrangement.'%');
    }

    public function leadBankName($lead_bank)
    {
        return $this->related('bankSearch', 'bank_name', 'LIKE', '%'.$lead_bank.'%');
    }

    public function isActive($is_active)
    {
        return $this->where('is_active', filter_var($is_active, FILTER_VALIDATE_BOOLEAN));
    }

}
