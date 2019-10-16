<?php

namespace App\Extensions;

use Carbon\Carbon;
use Firebase\JWT\JWT;

trait CTokenModelTrait
{
    /**
     * Get the token model class name.
     *
     * @return string
     */
    public static function tokenModel()
    {
        return config('cauth.token_model');
    }

    public function tokens()
    {
        return $this->morphMany(self::tokenModel(), 'user')->orderBy('created_at', 'desc');
    }

    public function revokeToken()
    {
        $this->tokens()->update(['revoked' => true]);
    }

    public function createToken()
    {
        $clientId = request()->clientId();

        $key = 'HhlzED0JNaKnr2GVSVmtKuGCCTTgb2qj';
        $token = [
            'id' => $this->id
        ];

        $accessToken = JWT::encode($token, $key);
        $expiresAt = Carbon::now()->addMinutes(config('cauth.token_expire_in', 15))->toDateTimeString();
        $expiresAt = new \MongoDB\BSON\UTCDateTime(strtotime($expiresAt) * 1000);

        $this->tokens()->delete();

        $this->tokens()->create([
            'client_id' => $clientId,
            'access_token' => $accessToken,
            'expires_at' => $expiresAt,
            'revoked' => 0
        ]);

        return [
            'access_token' => $accessToken,
            'expires_at' => $expiresAt,
        ];
    }
}
