<?php


namespace App\DAL;


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
}
