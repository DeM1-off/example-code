<?php

namespace App\Http\Controllers\API\Auth;


use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Service\Auth\AuthServiceInterface;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    /**
     * @var AuthServiceInterface
     */

    private $authService;


    /**
     * @param AuthServiceInterface $authService
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        return $this->authService->register($request->all());
    }

    /**
     * Login api
     *
     * @return BaseController
     */
    public function login(Request $request)
    {
        return $this->authService->login($request->all());
    }
}
