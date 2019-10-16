<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminBaseController;

class ResolutionagentController extends AdminBaseController
{
    function __construct(User $user){
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.resolutionagent.index');
    }

    public function getResolutionagent(Request $request)
    {
        try {
            $start = 1;
            $length = $request->get('length');
            
            $sort = $request->order[0]['column']?'email':'name';
            $order = $request->order[0]['dir']??'desc';
            if($request->get('start') > 0)
            {
                $start = ((int) ($request->get('start') / $length)) + 1;
            }
            if($request->get('draw')!=1)
            {
                $response = $this->api->with(['auth' => $this->user,'per_page' => $length,'page' =>$start,'sort'=>$sort,'order'=>$order])->get('api/resolutionagent');
            }
            else
            {
                $response = $this->api->with(['auth' => $this->user,'per_page' => $length,'page' =>$start])->get('api/resolutionagent');
            }
            
            if($request->search['value'])
            {
                   $q=$request->search['value'];
                   $response = $this->api->with(['auth' => $this->user,'per_page' => $length,'page' =>$start])->get('api/resolutionagent?search='.$q);
            }
            $response['recordsTotal'] = $response['meta']['total'];
            $response['recordsFiltered'] = $response['meta']['total'];
            $response['draw'] = $request->get('draw');
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resolutionagent = $this->user;
        return view('admin.resolutionagent.create',compact('resolutionagent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $response = $this->api->with(['auth'=>$this->user])->post('api/resolutionagent', $request->except(['_token','_url']));
            return redirect()->route('resolutionagent.index')->withSuccess($response);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        }
        catch(\Exception $ex){
            return $this->exceptionRedirect($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $families = $user->families()->whereNotIn('relation_ship', ['self'])->get();
        $user_contacts = UserContact::where('user_id', $user->id)->get();

        return view('admin.user.show', compact('user', 'families', 'user_contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resolutionagent = $this->api->with(['auth' => $this->user])->get('api/resolutionagent/'.$id);
        return view('admin.resolutionagent.edit', compact('resolutionagent'));
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
        try {
            $response = $this->api->with(['auth' => $this->user])->put('api/resolutionagent/'.$id, $request->except(['_token','_url']));

            return redirect()->route('resolutionagent.index')->withSuccess($response);
        }
        catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        }
        catch(\Exception $ex){
            return $this->exceptionRedirect($ex);
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
        //
    }

    public function searchResolutionagent(Request $request){
        $searchdata = $request->q;
        $response = $this->api->with(['auth' => $this->user])->get('api/resolutionagent?q='.$searchdata);
        return $response;
    }

}
