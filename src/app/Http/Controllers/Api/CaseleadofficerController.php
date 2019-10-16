<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CaseleadofficerService;
use App\Http\Resources\CaseleadofficerResource;
use App\Http\Requests\CaseleadofficerRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CaseleadofficerController extends Controller
{
    protected $CaseleadofficerService;

    public function __construct(CaseleadofficerService $CaseleadofficerService)
    {
        $this->CaseleadofficerService = $CaseleadofficerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $caseleadofficer = $this->CaseleadofficerService->index($request);
        return CaseleadofficerResource::collection($caseleadofficer);
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
    public function store(CaseLeadOfficerRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $caseLeadOfficer = $this->CaseleadofficerService->store($validatedData);

            return response()->json(['message' => 'Case Lead Officer Created'], 201);
            // return response()->json(new CaseleadofficerResource($caseLeadOfficer), 201);
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
            $caseLeadOfficerData = $this->CaseleadofficerService->show($id);
            return response()->json(new CaseleadofficerResource($caseLeadOfficerData), 200);
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
    public function update(CaseLeadOfficerRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {
            $caseLeadOfficer = $this->CaseleadofficerService->update($validatedData, $id);

            return response()->json(['message' => 'Case Lead Officer Updated'], 200);
            // return response()->json(new CaseleadofficerResource($caseLeadOfficer), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Case Lead Officer!'], 404);
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
        //     $deleteUser = $this->BorrowerService->destroy($id);

        //     return response()->json(['message' => 'Borrower has been deleted successfully!'], 200);
        // } catch(ModelNotFoundException $ex) {
        //     return response()->json(['message' => 'Unable to find requested Borrower!'], 404);
        // } catch (\Exception $ex) {
        //     return response()->json(['message' => $ex->getMessage()], 500);
        // }
    }
    public function getCaseLeadOfficerData(Request $request)
    {
        try {
            $caseLeadOfficer = $this->CaseleadofficerService->getMultiData($request->except('auth'));
            return response()->json($caseLeadOfficer);
            // return response()->json(new CaseleadofficerResource($caseLeadOfficer), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Case Lead Officer!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
