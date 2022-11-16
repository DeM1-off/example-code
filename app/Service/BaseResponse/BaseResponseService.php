<?php

namespace App\Service\BaseResponse;

class BaseResponseService implements BaseResponseServiceInterface
{
    /**
     * Success response method
     *
     * @param $result
     * @param $message
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function success($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    /**
     * Return error response
     *
     * @param $error
     * @param $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function error($error, $errorMessages, $code)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

}
