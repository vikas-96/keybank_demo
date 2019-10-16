<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminBaseController;

class CaseofficerController extends AdminBaseController
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
        return view('admin.caseofficer.index');
    }

    public function getCaseofficer(Request $request)
    {
        try {
            $start = 1;
            $length = $request->get('length');
            if($request->get('start') > 0)
            {
                $start = ((int) ($request->get('start') / $length)) + 1;
            }
            $sort = $request->order[0]['column']?'email':'name';
            $order = $request->order[0]['dir']??'desc';
            if($request->get('draw')!=1)
            {
                $response = $this->api->with(['auth' => $this->user,'per_page' => $length,'page' =>$start,'sort'=>$sort,'order'=>$order])->get('api/caseofficer');
            }
            else
            {
                $response = $this->api->with(['auth' => $this->user,'per_page' => $length,'page' =>$start])->get('api/caseofficer');
            }
            
            if($request->search['value'])
            {
                   $q=$request->search['value'];
                   $response = $this->api->with(['auth' => $this->user,'per_page' => $length,'page' =>$start])->get('api/caseofficer?search='.$q);
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
        $co = $this->user;
        return view('admin.caseofficer.create',compact('co'));
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
            $response = $this->api->with(['auth'=>$this->user])->post('api/caseofficer', $request->except(['_token','_url']));
            return redirect()->route('caseofficer.index')->withSuccess($response);
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
        $co = $this->api->with(['auth' => $this->user])->get('api/caseofficer/'.$id);
        return view('admin.caseofficer.edit', compact('co'));
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
            $response = $this->api->with(['auth' => $this->user])->put('api/caseofficer/'.$id, $request->except(['_token','_url']));

            return redirect()->route('caseofficer.index')->withSuccess($response);
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

    public function searchCaseofficer(Request $request){
        $searchdata = $request->q;
        $response = $this->api->with(['auth' => $this->user])->get('api/caseofficer?q='.$searchdata);
        return $response;
    }

}
