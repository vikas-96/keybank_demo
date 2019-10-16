<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CaseofficerService;
use App\Http\Resources\CaseofficerResource;
use App\Http\Requests\CaseofficerRequest;

class CaseofficerController extends Controller
{
    protected $CaseofficerService;

    public function __construct(CaseofficerService $CaseofficerService)
    {
        $this->CaseofficerService = $CaseofficerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $caseofficer = $this->CaseofficerService->index($request);
        return CaseofficerResource::collection($caseofficer);
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
    public function store(CaseofficerRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $Caseofficer = $this->CaseofficerService->store($validatedData);

            return response()->json(['message' => 'Case Officer Created'], 201);
            // return response()->json(new CaseofficerResource($Caseofficer), 201);
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
            $Caseofficer = $this->CaseofficerService->show($id);
            return response()->json(new CaseofficerResource($Caseofficer), 200);
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
    public function update(CaseofficerRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {
            $Caseofficer = $this->CaseofficerService->update($validatedData, $id);

            return response()->json(['message' => 'Case Officer Updated'], 200);
            // return response()->json(new CaseofficerResource($Caseofficer), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Case officer!'], 404);
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
        //     $deleteUser = $this->CaseofficerService->destroy($id);

        //     return response()->json(['message' => 'Borrower has been deleted successfully!'], 200);
        // } catch(ModelNotFoundException $ex) {
        //     return response()->json(['message' => 'Unable to find requested Borrower!'], 404);
        // } catch (\Exception $ex) {
        //     return response()->json(['message' => $ex->getMessage()], 500);
        // }
    }
    /**
     * [getCaseOfficerData description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCaseOfficerData(Request $request)
    {
        try {
            $caseLeadOfficer = $this->CaseofficerService->getMultiData($request->except('auth'));
            return response()->json($caseLeadOfficer);
            // return response()->json(new CaseleadofficerResource($caseLeadOfficer), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Case Lead Officer!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
