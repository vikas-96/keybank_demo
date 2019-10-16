<?php

namespace App\Services;

use App\Models\Loan;
use App\Models\Banklist;
use \DB;

class LoanService
{
    
    public function __construct(Loan $loan)
    {
        $this->loan = $loan ;
    }

    public function index($request)
    {

        $data = $this->loan;
        
        $searchFilters = $request->only(['account_no', 'bank_name', 'banking_arrangement', 'sbi_share', 'is_active']);
        
        // Dropdown autocomplete on search
        if($request->has('q')){
            $name = $request->q;
            if(is_numeric($request->q)){
                $data = $data->where('account_no', 'like', '%' . $name . '%');
            }else{
                $name = $request->q;
                $list = Banklist::where('bank_name','LIKE',"%".$name."%")->pluck('_id');
                $data = $data->whereIn('lead_bank', $list);
            }
            $data = $data->where('is_active',true);
            return $data->with('borrowerDetail')->with('bankDetail')->get();
        }
        if($request->has('search')){
            $name = $request->search;
            if(is_numeric($request->search)){
                $data = $data->where('account_no', 'like', '%' . $name . '%');
            }else{
                $name = $request->search;
                $list = Banklist::where('bank_name','LIKE',"%".$name."%")->pluck('_id');
                $data = $data->whereIn('lead_bank', $list);
            }
            $data = $data->where('is_active',true);
        }
        // Listing search filter
        if (! empty($searchFilters)) {

            if($request->has('bank_name')){
                $list = Banklist::where('bank_name','LIKE',"%".$request->bank_name."%")->pluck('_id');
            }

            $data =  $data->where(function ($query) use ($request, $searchFilters, $list) {
                foreach ($searchFilters as $key => $value) {
                    if ($request->has($key)) {
                        if ($request->has('is_active') && $key == 'is_active') {
                            $query->Where($key, filter_var($value, FILTER_VALIDATE_BOOLEAN));
                        }else if($request->has('bank_name') && $key == 'bank_name'){
                            $query->WhereIn('lead_bank', $list);
                        }else {
                            $query->Where($key, 'LIKE', "%" . $value . "%");
                        }
                    }
                    
                }
            });
        }
        $per_page = (int) $request->input('per_page', 10);
        $sort = $request->input('sort', 'created_at');
        $order = $request->input('order', 'asc');
        // DB::enableQueryLog();
        $data = $data->with('borrowerDetail')->with('bankDetail:bank_name')->orderBy($sort, $order)->paginate($per_page);
        // dd(
        //     DB::getQueryLog()
        // );
        return $data;
    }

    public function store($LoanData)
    {
        try {
            /*Create a record in the users table*/
            $loan = Loan::create([
                'borrower_id' => $LoanData['borrower_id'], 
                'account_no' => $LoanData['account_no'],
                'first_sanction_date' => new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($LoanData['first_sanction_date']) * 1000),
                'banking_arrangement' => $LoanData['banking_arrangement'],
                'lead_bank' => $LoanData['lead_bank'],
                'sbi_share' => $LoanData['sbi_share'],
                'npa_date' => new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($LoanData['npa_date']) * 1000),
                'is_active' => $LoanData['is_active'],
            ]);
            
            return $loan;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
    public function show($id)
    {
        $loanData = Loan::find($id);
        if(!empty($loanData)){
            return $loanData;
        }
        throw new \Exception("Record not found");
    }

    public function update($loanData, $loanId)
    {
        
        $currentloan = Loan::findOrFail($loanId);
        $currentloan->update([
            'borrower_id' => $loanData['borrower_id'], 
            'account_no' => $loanData['account_no'],
            'first_sanction_date' => new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($loanData['first_sanction_date']) * 1000),
            'banking_arrangement' => $loanData['banking_arrangement'],
            'lead_bank' => $loanData['lead_bank'],
            'sbi_share' => $loanData['sbi_share'],
            'npa_date' => new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($loanData['npa_date']) * 1000),
            'is_active' => $loanData['is_active'],
        ]);

        return $currentloan;
    }

    public function destroy($id)
    {
        // $loan = Loan::findOrFail($id);

        // if ($loan->delete()) {
        //     return $loan;
        // }
    }
    /**
     * [convertToTimestamp description]
     * @param  [type] $date [description]
     * @return [type]       [description]
     */
    public function convertToTimestamp($date)
    {
        return \DateTime::createFromFormat('d/m/Y', $date)->getTimestamp();
    }
}
