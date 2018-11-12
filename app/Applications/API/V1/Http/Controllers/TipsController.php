<?php


namespace V1\Http\Controllers;


use App\Http\Controllers\JsonController;
use App\Modules\Response\Json\JsonResponseFactory;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse as IlluminateJsonResponse;
use V1\Services\Tip\Requests\IndexRequest;
use V1\Services\Tip\Requests\NewRequest;
use V1\Services\Tip\TipService;

class TipsController extends JsonController
{
    /**
     * @var TipService
     */
    private $service;

    /**
     * @var DatabaseManager
     */
    private $database;

    public function __construct(TipService $service, JsonResponseFactory $response, DatabaseManager $database)
    {
        parent::__construct($response);
        $this->service = $service;
        $this->database = $database;
    }

    /**
     * Return all tips from database
     * ?paginate=1&perPage=N&page=N to paginate the results
     * @param IndexRequest $request
     * @return IlluminateJsonResponse
     */
    public function index(IndexRequest $request): IlluminateJsonResponse
    {
        $items = $this->service->index($request);

        return $this->response()->ok('', ['result' => $items->toArray()]);
    }

    /**
     * Single representation of tip
     * @param string $uuid
     * @return IlluminateJsonResponse
     */
    public function show(string $uuid): IlluminateJsonResponse
    {
        try {
            $tip = $this->service->show($uuid);

            return $this->response()->ok('', ['result' => $tip->toArray()]);
        } catch (ModelNotFoundException $exception) {
            return $this->response()->notFound($exception->getMessage());
        }
    }

    /**
     * @param NewRequest $request
     * @return IlluminateJsonResponse
     * @throws \Exception
     */
    public function store(NewRequest $request): IlluminateJsonResponse
    {
        $this->database->beginTransaction();
        $tip = $this->service->store($request);
        $this->database->commit();

        return $this->response()->created('', ['result' => $tip->toArray()]);
    }

    public function update(string $uuid)
    {
    }

    public function destroy(string $uuid)
    {
    }
}
