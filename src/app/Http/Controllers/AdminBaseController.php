<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dingo\Api\Routing\Helpers;

class AdminBaseController extends Controller
{
    use Helpers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function internalExceptionRedirect($exception, $route = '')
    {
        $response = $exception->getResponse()->getOriginalContent();
        $response['errors'] = array_key_exists('errors', $response) ? $response['errors'] : $response['message'];

        return redirect()->back()->withInput()->withErrors($response['errors']);
    }

    protected function exceptionRedirect($exception, $route = '')
    {
        return redirect()->back()->withInput()->with('error', $exception->getMessage());
    }
}
