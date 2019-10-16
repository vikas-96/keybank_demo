<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ResolutionagentService;
use App\Http\Resources\ResolutionagentResource;
use App\Http\Requests\ResolutionagentRequest;

class ResolutionagentController extends Controller
{
    protected $ResolutionagentService;

    public function __construct(ResolutionagentService $ResolutionagentService)
    {
        $this->ResolutionagentService = $ResolutionagentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Resolutionagent = $this->ResolutionagentService->index($request);
        return ResolutionagentResource::collection($Resolutionagent);
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
    public function store(ResolutionagentRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $Resolutionagent = $this->ResolutionagentService->store($validatedData);

            return response()->json(['message' => 'Resolution Agent Created'], 201);
            // return response()->json(new ResolutionagentResource($Resolutionagent), 201);
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
            $ResolutionagentData = $this->ResolutionagentService->show($id);
            return response()->json(new ResolutionagentResource($ResolutionagentData), 200);
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
    public function update(ResolutionagentRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {
            $Resolutionagent = $this->ResolutionagentService->update($validatedData, $id);

            return response()->json(['message' => 'Resolution Agent Updated'], 200);
            // return response()->json(new ResolutionagentResource($Resolutionagent), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Resolution agent!'], 404);
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
    /**
     * [getResolutionAgent description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getResolutionAgent(Request $request)
    {
        try {
            $Resolutionagent = $this->ResolutionagentService->getMultiData($request->except('auth'));
            return response()->json($Resolutionagent);
            // return response()->json(new CaseleadofficerResource($caseLeadOfficer), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Resolution Agent!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
