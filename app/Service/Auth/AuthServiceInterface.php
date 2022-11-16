<?php

namespace App\Service\Auth;

interface AuthServiceInterface
{
    /**
     *  Register api
     *
     * @param $request
     * @return mixed
     */
    public function register($request);

    /**
     *  Login api
     *
     * @param $request
     * @return mixed
     */
    public function login($request);

}
