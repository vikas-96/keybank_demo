<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\LoanService;
use App\Http\Resources\LoanResource;
use App\Http\Requests\LoanRequest;

class LoanController extends Controller
{
    protected $LoanService;

    public function __construct(LoanService $LoanService)
    {
        $this->LoanService = $LoanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loan = $this->LoanService->index($request);
        return LoanResource::collection($loan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $loan = $this->LoanService->store($validatedData);

            return response()->json(['message' => 'Loan Created'], 201);
            // return response()->json(new LoanResource($loan), 201);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $loanData = $this->LoanService->show($id);
            return response()->json(new LoanResource($loanData), 200);
        }catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 404);
        }
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
    public function update(LoanRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        try {
            $loan = $this->LoanService->update($validatedData, $id);

            return response()->json(['message' => 'Loan Updated'], 200);
            // return response()->json(new LoanResource($loan), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested loan!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try {
        //     $deleteUser = $this->LoanService->destroy($id);

        //     return response()->json(['message' => 'Borrower has been deleted successfully!'], 200);
        // } catch(ModelNotFoundException $ex) {
        //     return response()->json(['message' => 'Unable to find requested Borrower!'], 404);
        // } catch (\Exception $ex) {
        //     return response()->json(['message' => $ex->getMessage()], 500);
        // }
    }
}
