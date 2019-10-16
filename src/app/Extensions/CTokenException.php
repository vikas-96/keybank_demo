<?php

namespace App\Extensions;

use Exception;

class CTokenException extends Exception
{
    /**
     * @var int
     */
    private $httpStatusCode;
    /**
     * @var string
     */
    private $errorType;

    /**
     * Throw a new exception.
     *
     * @param string      $message        Error message
     * @param int         $code           Error code
     * @param string      $errorType      Error type
     * @param int         $httpStatusCode HTTP status code to send (default = 400)
     */
    public function __construct($message, $code, $errorType, $httpStatusCode = 400)
    {
        parent::__construct($message, $code);
        $this->httpStatusCode = $httpStatusCode;
        $this->errorType = $errorType;
    }

    /**
     * Invalid client error.
     *
     * @return static
     */
    public static function invalidClient()
    {
        return new static('Client authentication failed', 4, 'invalid_client', 401);
    }

    /**
     * Invalid credentials error.
     *
     * @return static
     */
    public static function invalidCredentials()
    {
        return new static('The user credentials were incorrect.', 6, 'invalid_credentials', 401);
    }

    /**
     * Invalid server error.
     *
     * @return static
     */
    public static function serverError()
    {
        return new static('The authorization server encountered an unexpected condition which prevented it from fulfilling the request.', 7, 'server_error', 500);
    }

    /**
     * Invalid access denied.
     *
     * @return static
     */
    public static function accessDenied()
    {
        return new static('The authorization server denied the request.', 9, 'access_denied', 401);
    }

    /**
     * Access Token Expire.
     *
     * @return static
     */
    public static function invalidToken()
    {
        return new static('The access token is invalid.', 20, 'invalid_token', 401);
    }

    /**
     * Access Token Expire.
     *
     * @return static
     */
    public static function expiredToken()
    {
        return new static('The access token expired.', 21, 'expired_token', 401);
    }

    /**
     * Returns the error type
     *
     * @return string
     */
    public function getErrorType()
    {
        return $this->errorType;
    }

    /**
     * Returns the HTTP status code to send when the exceptions is output.
     *
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'error_type' => $this->errorType,
            'message' => $this->message
        ], $this->httpStatusCode);
    }

}
