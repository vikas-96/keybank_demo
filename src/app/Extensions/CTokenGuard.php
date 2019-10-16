<?php

namespace App\Extensions;

use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class CTokenGuard implements Guard
{
    use GuardHelpers;

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * The config array.
     *
     * @var array
     */
    protected $config;

    /**
     * The name of the query string item from the request containing the API token.
     *
     * @var string
     */
    protected $inputKey;

    /**
     * The name of the token "column" in persistent storage.
     *
     * @var string
     */
    protected $storageKey;

    /**
     * The current access token for the authentication user.
     *
     * @var string
     */
    protected $token;

    /**
     * Indicates if the API token is hashed in storage.
     *
     * @var bool
     */
    protected $hash = false;

    /**
     * Create a new authentication guard.
     *
     * @param  \Illuminate\Contracts\Auth\UserProvider  $provider
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $inputKey
     * @param  string  $storageKey
     * @param  bool  $hash
     * @return void
     */
    public function __construct(UserProvider $provider, Request $request, $config)
    {
        $this->hash = $config['token_hash'];
        $this->request = $request;
        $this->provider = $provider;
        $this->config = $config;
        $this->inputKey = $config['token_input_key'];
        $this->storageKey = $config['token_input_key'];
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if (!is_null($this->user)) {
            return $this->user;
        }
        $user = null;

        // retrieve via token
        $this->token = $this->getTokenForRequest();

        if (!empty($this->token)) {
            // the token was found, how you want to pass?
            $user = $this->provider->retrieveByToken(null, $this->token);
        }

        return $this->user = $user;
    }

    public function token()
    {
        return $this->token;
    }

    /**
     * Get the token for the current request.
     *
     * @return string
     */
    public function getTokenForRequest()
    {
        $token = $this->request->bearerToken();

        if (empty($token)) {
            $token = $this->request->query($this->inputKey);
        }

        if (empty($token)) {
            $token = $this->request->input($this->inputKey);
        }

        if (empty($token)) {
            $token = $this->request->getPassword();
        }

        return $token;
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        return false;
    }

    /**
     * Set the current request instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Set the current request instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @param  string  $model
     * @return bool
     */
    public function attempt(array $credentials = [], $model = null)
    {
        if (!is_null($model)) {
            $this->provider->setModel($model);
        }

        $user = $this->provider->retrieveByCredentials($credentials);

        if (!is_null($user) && $this->provider->validateCredentials($user, $credentials)) {
            $this->setUser($user);

            return $user;
        }

        return false;
    }

    /**
     * Log the given user ID into the application.
     *
     * @param mixed  $id
     * @param string $model
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|false
     */
    public function loginUsingId($id, $model = null)
    {
        if (!is_null($model)) {
            $this->provider->setModel($model);
        }

        if (!is_null($user = $this->provider->retrieveById($id))) {
            $this->setUser($user);

            return $user;
        }

        return false;
    }
}
