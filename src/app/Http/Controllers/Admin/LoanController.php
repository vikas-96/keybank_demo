<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Borrower;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminBaseController;

class LoanController extends AdminBaseController
{
    function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.loan.index');
    }

    public function getLoan(Request $request)
    {
        try {
            $start = 1;
            $length = $request->get('length');
            if ($request->get('start') > 0) {
                $start = ((int) ($request->get('start') / $length)) + 1;
            }
            $order = $request->order[0]['dir'] ?: 'asc';
            $sort = $request->columns[0]['name'] ?: 'created_at';
            $response = $this->api->with(['auth' => $this->user, 'per_page' => $length, 'page' => $start, 'sort' => $sort, 'order' => $order])->get('api/loan');
            if ($request->search['value']) {
                $q = $request->search['value'];
                $response = $this->api->with(['auth' => $this->user, 'per_page' => $length, 'page' => $start])->get('api/loan?search=' . $q);
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
        $loan = $this->user;
        $banklist = $this->api->with(['auth' => $this->user])->get('api/banklist');
        return view('admin.loan.create', compact('loan', 'banklist'));
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
            $response = $this->api->with(['auth' => $this->user])->post('api/loan', $request->except(['_token', '_url']));
            return redirect()->route('loan.index')->withSuccess($response);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
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
        $loan = $this->api->with(['auth' => $this->user])->get('api/loan/' . $id);
        $banklist = $this->api->with(['auth' => $this->user])->get('api/banklist');
        return view('admin.loan.edit', compact('loan', 'banklist'));
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
            $response = $this->api->with(['auth' => $this->user])->put('api/loan/' . $id, $request->except(['_token', '_url']));

            return redirect()->route('loan.index')->withSuccess($response);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
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

    public function searchLoan(Request $request)
    {
        $searchdata = $request->q;
        $response = $this->api->with(['auth' => $this->user])->get('api/loan?q=' . $searchdata);
        return $response;
    }
}
