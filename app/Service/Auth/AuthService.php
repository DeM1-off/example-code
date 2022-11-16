<?php

namespace App\Service\Auth;

use App\Helper\ResponseWords;
use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthService extends BaseController implements AuthServiceInterface
{

    /**
     * Register api
     *
     * @param $request
     * @return BaseController
     */
    public function register($request)
    {
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        return $this->sendResponse($success, ResponseWords::USER_REGISTER);
    }

    /**
     * Login api
     *
     * @param $request
     * @return BaseController|JsonResponse
     */
    public function login($request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->sendError(ResponseWords::UNAUTHORISED, ['error' => ResponseWords::UNAUTHORISED]);
        }
        $user = Auth::user();
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        return $this->sendResponse($success, ResponseWords::USER_LOGIN);

    }
}
