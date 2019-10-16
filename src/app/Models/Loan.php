<?php

namespace App\Models;

use Moloquent;
use EloquentFilter\Filterable;

class Loan extends Moloquent
{
    use Filterable;
    
    protected $fillable = ['borrower_id', 'account_no', 'first_sanction_date', 'banking_arrangement', 'lead_bank', 'sbi_share', 'npa_date', 'is_active'];

    /**
     * [bankDetail description]
     * @return [type] [description]
     */
    public function bankDetail()
    {
        return $this->hasOne('App\Models\Banklist','_id','lead_bank')->select('bank_name');
    }
    /**
     * [borrowerDetail description]
     * @return [type] [description]
     */
    public function borrowerDetail()
    {
        return $this->hasOne('App\Models\Borrower','_id','borrower_id')->select('name','cif')->where('is_active',true);
    }
    /**
     * [setIsActiveAttribute description]
     * @param [type] $value [description]
     */
    public function setIsActiveAttribute($value){
        $this->attributes['is_active'] = (bool) $value;
    }

}

