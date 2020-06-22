<?php
/**
 * Created by PhpStorm.
 * User: GiangNT
 * Date: 16/8/2019
 * Time: 8:44 AM
 */

namespace App\Common;

class ApiResponse
{
    const SUCCESS = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const BAD = 400;
    const UNAUTHORIZED = 401;
    const PAYMENT_REQUIRED = 402;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const CONFLICT = 409;
    const UNPROCESSED = 422;
    const SERVER_ERROR = 500;

    private $data = [];
    private $statusCode = 200;
    private $isError = false;
    private $messages = [];

    /**
     * Review API has error
     *
     * @return bool
     */
    public function isError(): bool
    {
        return $this->isError;
    }

    /**
     * Settings of response data
     *
     * @param array|string $data Data of result
     * @param int $httpStatus Set Http status code
     * @param bool $isError Set response is error or not (false: not error, true: has error)
     * @param array|string $messages Message of error (validate, ...)
     */
    public function set($data = [], $httpStatus = self::SUCCESS, $isError = false, $messages = []): void
    {
        $this->isError = $isError;
        $this->statusCode = $httpStatus;
        $this->messages = $messages;
        $this->data = $data;
    }

    /**
     * Response JSON with format-ed data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function result()
    {
        if ($this->isError) {
            $error = 1;
            $success = 0;
            $message = __('error.api.error');
        } else {
            $error = 0;
            $success = 1;
            $message = __('error.api.success');
        }

        $result = [
            'status' => [
                'error' => $error,
                'success' => $success,
                'message' => !empty($this->messages) ? $this->messages : $message
            ],
            'result' => $this->data
        ];
        return response()->json($result, $this->statusCode);
    }

}
