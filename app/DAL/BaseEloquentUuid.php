<?php


namespace App\DAL;


use App\Models\Base\UuidModel;
use App\Modules\Pagination\Paginator;
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

    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->newQuery()->with($relations)->get($columns);
    }

    public function paginate(int $page, int $perPage = 20, array $columns = ['*']): Paginator
    {
        return new Paginator($this->newQuery()->paginate($perPage, $columns, 'page', $page), request());
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
