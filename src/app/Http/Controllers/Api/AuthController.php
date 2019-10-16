<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PasswordResetRequestNotification;
use App\Notifications\PasswordResetSuccessNotification;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $credentials = ['email' => $request->username, 'password' => $request->password];

            if (Auth::attempt($credentials)) {
                $token = Auth::user()->createToken();

                $response = [
                    'access_token' => $token['access_token'],
                    'expires_at' => $token['expires_at'],
                    'user' => $this->getAuthUserData(),
                ];

                return response()->json($response, 200);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 401);
            }
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    protected function getAuthUserData()
    {
        $user = Auth::user();

        $response = [
            'id' => $user->id,
            'name' => $user->firstname . " " . $user->lastname,
            'email' => $user->email,
            'contact_number' => $user->contact_number,
            'roles' => $user->getRoleNames(),
        ];

        // if ($user->hasRole(['receptionist', 'nurse'])) {
        //     $response['doctors'] = $user->user_detail->doctors;
        // }

        return $response;
    }

    /**
     * Create forget password token.
     *
     * @param  [string] email
     *
     * @return [string] message
     */
    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->email)->first();
        }

        if (empty($user)) {
            return response()->json([
                'message' => 'We cant find a user with that e-mail address.',
            ], 404);
        }

        try {
            if (!empty($user->email)) {
                $passwordReset = PasswordReset::updateOrCreate(
                    ['email' => $user->email],
                    [
                        'email' => $user->email,
                        'token' => str_random(60),
                    ]
                );

                $user->notify(new PasswordResetRequestNotification($user, $passwordReset->token));
            }

            return response()->json([
                'message' => 'We have e-mailed your password reset link!',
            ]);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::user()->revokeToken();

            return response()->json([], 204);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    /**
     * Reset password.
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     *
     * @return [string] message
     * @return [json]   user object
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string',
        ]);

        $passwordReset = PasswordReset::where('token', $request->token)->where('email', $request->email)->first();

        if (!$passwordReset) {
            return response()->json([
                'message' => 'This password reset token is invalid.',
            ], 404);
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(config('auth.passwords.users.expire', 60))->isPast()) {
            $passwordReset->delete();

            return response()->json([
                'message' => 'This password reset token is invalid.',
            ], 404);
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'We cant find a user with that e-mail address.',
            ], 404);
        }

        try {
            $user->password = $request->password;
            $user->save();

            $passwordReset->delete();

            $user->notify(new PasswordResetSuccessNotification());

            return response()->json([
                'message' => 'Password has been reset successfully.',
            ], 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
