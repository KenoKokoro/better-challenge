<?php


namespace V1\Http\Controllers;


use App\Http\Controllers\JsonController;
use App\Modules\Response\Json\JsonResponseFactory;
use Illuminate\Http\JsonResponse as IlluminateJsonResponse;
use V1\Services\Tip\Requests\IndexRequest;
use V1\Services\Tip\TipService;

class TipsController extends JsonController
{
    /**
     * @var TipService
     */
    private $service;

    public function __construct(TipService $service, JsonResponseFactory $response)
    {
        parent::__construct($response);
        $this->service = $service;
    }

    public function index(IndexRequest $request): IlluminateJsonResponse
    {
        $items = $this->service->index($request);

        return $this->response()->ok('', ['result' => $items->toArray()]);
    }

    public function show(string $uuid)
    {
    }

    public function store()
    {
    }

    public function update(string $uuid)
    {
    }

    public function destroy(string $uuid)
    {
    }
}
