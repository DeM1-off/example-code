<?php

namespace App\Service\BaseResponse;

interface BaseResponseServiceInterface
{

    /**
     * Success response method
     *
     * @param $result
     * @param $message
     * @return mixed
     */
    public function success($result, $message);

    /**
     * @param $error
     * @param $errorMessages
     * @param int $code
     * @return mixed
     */
    public function error($error, $errorMessages, $code);
}
