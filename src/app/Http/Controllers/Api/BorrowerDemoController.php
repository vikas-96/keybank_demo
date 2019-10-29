<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\BorrowerDemoService;
use App\Http\Requests\BorrowerDemorequest;
use App\Http\Resources\BorrowerDemoResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BorrowerDemoController extends Controller
{
    protected $BorrowerDemoService;

    public function __construct(BorrowerDemoService $BorrowerDemoService)
    {
        $this->BorrowerDemoService = $BorrowerDemoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $borrower = $this->BorrowerDemoService->index($request);
        return BorrowerDemoResource::collection($borrower);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowerDemorequest $request)
    {
        $validatedData = $request->validated();

        try {
            $borrower = $this->BorrowerDemoService->store($validatedData);

            return response()->json(['message' => 'Borrower Created'], 201);
            // return response()->json(new BorrowerResource($borrower), 201);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $borrowerdata = $this->BorrowerDemoService->show($id);
            return response()->json(new BorrowerResource($borrowerdata), 200);
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
    public function update(BorrowerRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {
            $borrower = $this->BorrowerDemoService->update($validatedData, $id);

            return response()->json(['message' => 'Borrower Updated'], 200);
            // return response()->json(new BorrowerResource($borrower), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Borrower!'], 404);
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
        //     $deleteUser = $this->BorrowerDemoService->destroy($id);

        //     return response()->json(['message' => 'Borrower has been deleted successfully!'], 200);
        // } catch(ModelNotFoundException $ex) {
        //     return response()->json(['message' => 'Unable to find requested Borrower!'], 404);
        // } catch (\Exception $ex) {
        //     return response()->json(['message' => $ex->getMessage()], 500);
        // }
    }

}
