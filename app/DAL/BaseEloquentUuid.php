<?php


namespace App\DAL;


use App\Models\Base\UuidModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class BaseEloquentUuid implements UuidRepository
{
    /**
     * @var UuidModel|Builder
     */
    private $query;

    /**
     * @var UuidModel
     */
    private $model;

    public function __construct(UuidModel $model)
    {
        $this->model = $model;
        $this->query = $model;
    }

    /**
     * Return all data from database
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->newQuery()->with($relations)->get($columns);
    }

    /**
     * Return new query instance
     * @return Builder
     */
    protected function newQuery(): Builder
    {
        return $this->query->newQuery();
    }
}
