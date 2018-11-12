<?php


namespace App\DAL;


use App\Modules\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

interface UuidRepository
{
    /**
     * Return all data from database
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * Return paginated results
     * @param int   $page
     * @param int   $perPage
     * @param array $columns
     * @return Paginator
     */
    public function paginate(int $page, int $perPage = 20, array $columns = ['*']): Paginator;
}
