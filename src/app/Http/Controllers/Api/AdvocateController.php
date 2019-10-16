<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\AdvocateService;
use App\Http\Resources\AdvocateResource;
use App\Http\Requests\AdvocateRequest;

class AdvocateController extends Controller
{
    protected $AdvocateService;

    public function __construct(AdvocateService $AdvocateService)
    {
        $this->AdvocateService = $AdvocateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $advocate = $this->AdvocateService->index($request);
        return AdvocateResource::collection($advocate);
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
    public function store(AdvocateRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $Advocate = $this->AdvocateService->store($validatedData);

            return response()->json(['message' => 'Advocate Created'], 201);
            // return response()->json(new AdvocateResource($Advocate), 201);
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
            $AdvocateData = $this->AdvocateService->show($id);
            return response()->json(new AdvocateResource($AdvocateData), 200);
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
    public function update(AdvocateRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {
            $Advocate = $this->AdvocateService->update($validatedData, $id);

            return response()->json(['message' => 'Advocate Updated'], 200);
            // return response()->json(new AdvocateResource($Advocate), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Advocate!'], 404);
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
        //     $deleteUser = $this->AdvocateService->destroy($id);

        //     return response()->json(['message' => 'Borrower has been deleted successfully!'], 200);
        // } catch(ModelNotFoundException $ex) {
        //     return response()->json(['message' => 'Unable to find requested Borrower!'], 404);
        // } catch (\Exception $ex) {
        //     return response()->json(['message' => $ex->getMessage()], 500);
        // }
    }
}
