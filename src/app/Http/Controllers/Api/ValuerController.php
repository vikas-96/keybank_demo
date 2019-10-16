<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ValuerService;
use App\Http\Resources\ValuerResource;
use App\Http\Requests\ValuerRequest;

class ValuerController extends Controller
{
    protected $ValuerService;

    public function __construct(ValuerService $ValuerService)
    {
        $this->ValuerService = $ValuerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $valuer = $this->ValuerService->index($request);
        return ValuerResource::collection($valuer);
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
    public function store(ValuerRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $Valuer = $this->ValuerService->store($validatedData);

            return response()->json(['message' => 'Valuer Created'], 201);
            // return response()->json(new ValuerResource($Valuer), 201);
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
            $Valuer = $this->ValuerService->show($id);
            return response()->json(new ValuerResource($Valuer), 200);
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
    public function update(ValuerRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {
            $Valuer = $this->ValuerService->update($validatedData, $id);

            return response()->json(['message' => 'Valuer updated'], 200);
            // return response()->json(new ValuerResource($Valuer), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Valuer!'], 404);
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
        //     $deleteUser = $this->ValuerService->destroy($id);

        //     return response()->json(['message' => 'Borrower has been deleted successfully!'], 200);
        // } catch(ModelNotFoundException $ex) {
        //     return response()->json(['message' => 'Unable to find requested Borrower!'], 404);
        // } catch (\Exception $ex) {
        //     return response()->json(['message' => $ex->getMessage()], 500);
        // }
    }
}
