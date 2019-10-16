<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Borrower;
use App\Models\Loan;
use App\Models\Caseleadofficer;
use App\Models\Caseofficer;
use App\Models\Advocate;
use App\Models\Valuer;
use App\Models\Resolutionagent;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $borrower = Borrower::count();
        $loan = Loan::count();
        $caseleadofficer = Caseleadofficer::count();
        $caseofficer = Caseofficer::count();
        $advocate = Advocate::count();
        $valuer = Valuer::count();
        $resolutionagent = Resolutionagent::count();

        $counts = [
            'users' => $users,
            'borrowers' => $borrower,
            'loans' => $loan,
            'case_lead_officers' => $caseleadofficer,
            'case_officers' => $caseofficer,
            'advocates' => $advocate,
            'valuers' => $valuer,
            'resolution_agents' => $resolutionagent,
        ];
          
        return response()->json($counts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
