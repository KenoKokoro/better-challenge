<?php


namespace App\Modules\Response\Json;


use Illuminate\Http\JsonResponse as IlluminateJsonResponse;

interface JsonResponseFactory
{
    /**
     * Return 200 response
     * @param null|string $message
     * @param array       $append
     * @return IlluminateJsonResponse
     */
    public function ok(?string $message, array $append = []): IlluminateJsonResponse;

    /**
     * Return 201 response
     * @param null|string $message
     * @param array       $append
     * @return IlluminateJsonResponse
     */
    public function created(?string $message, array $append = []): IlluminateJsonResponse;

    /**
     * Return 403 response
     * @param null|string $message
     * @return IlluminateJsonResponse
     */
    public function forbidden(?string $message): IlluminateJsonResponse;

    /**
     * Return 422 response
     * @param null|string $message
     * @param array       $append
     * @return IlluminateJsonResponse
     */
    public function unprocessableEntity(?string $message, array $append = []): IlluminateJsonResponse;

    /**
     * Return 401 response
     * @param null|string $message
     * @return IlluminateJsonResponse
     */
    public function unauthorized(?string $message): IlluminateJsonResponse;

    /**
     * Return 404 response
     * @param null|string $message
     * @return IlluminateJsonResponse
     */
    public function notFound(?string $message): IlluminateJsonResponse;

    /**
     * Return 405 response
     * @param null|string $message
     * @return IlluminateJsonResponse
     */
    public function methodNotAllowed(?string $message): IlluminateJsonResponse;

    /**
     * Return 500 response
     * @param null|string $message
     * @return IlluminateJsonResponse
     */
    public function internalError(?string $message): IlluminateJsonResponse;
}
