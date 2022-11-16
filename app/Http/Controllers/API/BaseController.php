<?php

namespace App\Http\Controllers\API;

use App\Service\BaseResponse\BaseResponseServiceInterface;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{

    /**
     * @var BaseResponseServiceInterface
     */
    private $responseService;

    public function __construct(BaseResponseServiceInterface $responseService)
    {
        $this->responseService = $responseService;
    }

    /**
     * Success response method
     *
     * @param $result
     * @param $message
     * @return BaseController
     */
    public function sendResponse($result, $message)
    {
        return $this->responseService->success($result, $message);
    }

    /**
     * return error response
     *
     * @param $error
     * @param array|string $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, array $errorMessages = [], int $code = 404)
    {
        return $this->responseService->error($error, $errorMessages, $code);
    }
}
