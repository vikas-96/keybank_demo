<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminBaseController;
use Illuminate\Support\Facades\Hash;
use Dingo\Api\Routing\Helpers;
use DataTables;


class UserController extends AdminBaseController
{
    use Helpers;

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
        return view('admin.user.index');
    }

    public function getUsers(Request $request)
    {
        try {
            $start = 1;
            $length = $request->get('length');
            if($request->get('start') > 0)
            {
                $start = ((int) ($request->get('start') / $length)) + 1;
            }
            $sort = $request->order[0]['column']?'lastname':'firstname';
            $order = $request->order[0]['dir']??'desc';
            if($request->get('draw')!=1)
            {
                $response = $this->api->with(['auth' => $this->user,'per_page' => $length,'page' =>$start,'sort'=>$sort,'order'=>$order])->get('api/users');
            }
            else
            {
                $response = $this->api->with(['auth' => $this->user,'per_page' => $length,'page' =>$start])->get('api/users');
            }
            
            if($request->search['value'])
            {
                   $q=$request->search['value'];
                   $response = $this->api->with(['auth' => $this->user,'per_page' => $length,'page' =>$start])->get('api/users?search='.$q);
            }
            $response['recordsTotal'] = $response['meta']['total'];
            $response['recordsFiltered'] = $response['meta']['total'];
            $response['draw'] = $request->get('draw');
        } catch (\Exception $ex) {
            $cards = [];
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
        $roles = Role::select('name','display_name')->get();
        $user = $this->user;
        return view('admin.user.create',compact('user','roles'));
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
            $response = $this->api->with(['auth'=>$this->user])->post('api/users', $request->except(['_token','_url']));
            return redirect()->route('users.index')->withSuccess($response);
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
        $roles = Role::select('name','display_name')->get();
        $user = $this->api->with(['auth' => $this->user])->get('api/users/'.$id);
        return view('admin.user.edit', compact('user','roles'));
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
            $response = $this->api->with(['auth' => $this->user])->put('api/users/'.$id, $request->except(['_token','_url']));

            return redirect()->route('users.index')->withSuccess($response);
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
        try {
            $response = $this->api->with(['auth' => $this->user])->delete('api/users/'.$id);
            return redirect()->route('users.index')->withSuccess($response);
        }
        catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        }
        catch(\Exception $ex){
            return $this->exceptionRedirect($ex);
        }
    }

    public function searchUser(Request $request){
        $searchdata = $request->q;
        $response = $this->api->with(['auth' => $this->user])->get('api/users?q='.$searchdata);
        return $response;
    }

}
