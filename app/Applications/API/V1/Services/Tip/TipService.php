<?php


namespace V1\Services\Tip;


use App\DAL\Contracts\TipRepository;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use V1\Services\Tip\Requests\IndexRequest;
use V1\Services\Tip\Requests\NewRequest;

class TipService
{
    /**
     * @var TipRepository
     */
    private $repository;

    public function __construct(TipRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Determine if paginated results should be returned or all
     * @param IndexRequest $request
     * @return Arrayable
     */
    public function index(IndexRequest $request): Arrayable
    {
        $options = $request->validated();

        if ($options['paginate'] ?? false === true) {
            return $this->repository->paginate($options['page'], $options['perPage']);
        }

        return $this->repository->all();
    }

    /**
     * Single representation of tips. Throws an exception if guid not found in database
     * @param string $uuid
     * @return Arrayable
     * @throws ModelNotFoundException
     */
    public function show(string $uuid): Arrayable
    {
        return $this->repository->show($uuid);
    }

    /**
     * Save new request to database as tip
     * @param NewRequest $request
     * @return Arrayable
     */
    public function store(NewRequest $request): Arrayable
    {
        return $this->repository->create($request->validated());
    }
}
