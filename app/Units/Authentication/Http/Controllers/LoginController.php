<?php

namespace BestPrice\Units\Authentication\Http\Controllers;

use BestPrice\Support\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class LoginController
 * @package BestPrice\Units\Authentication\Http\Controllers
 */
class LoginController extends Controller
{
    use ThrottlesLogins;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('email', 'password'); // grab credentials from the request
        try {
            if (!$token = app('tymon.jwt.auth')->attempt($credentials)) { // attempt to verify the credentials and create a token for the user
                $this->incrementLoginAttempts($request);

                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            $this->incrementLoginAttempts($request);
            return response()->json(['error' => 'could_not_create_token'], 500); // something went wrong whilst attempting to encode the token
        }

        return response()->json(['token' => "Bearer $token"]);
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        $message = Lang::get('auth.throttle', ['seconds' => $seconds]);

        return response()->json(['error' => $message], Response::HTTP_TOO_MANY_REQUESTS);
    }
}
