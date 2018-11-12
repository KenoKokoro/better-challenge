<?php


namespace V1\Tests\Unit\Http\Controllers;


use App\DAL\Contracts\TipRepository;
use App\Models\Tip;
use App\Modules\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery\MockInterface;
use Tests\TestCase;
use V1\Http\Controllers\TipsController;
use V1\Services\Tip\Requests\IndexRequest;

class TipsControllerTest extends TestCase
{
    /**
     * @var MockInterface
     */
    private $repository;

    /**
     * @var TipsController
     */
    private $controller;

    protected function setUp()
    {
        parent::setUp();
        $this->repository = $this->newMock(TipRepository::class);
        $this->controller = app(TipsController::class);
    }

    /** @test */
    public function all_tip_results_should_be_returned_if_pagination_is_not_required(): void
    {
        $request = new IndexRequest();
        $request->setContainer($this->app);
        $this->repository->shouldReceive('all')->once()->andReturn(make(Tip::class, 5));

        $response = $this->controller->index($request);

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function tip_results_should_be_paginated_if_the_query_values_are_set(): void
    {
        $request = new IndexRequest(['paginate' => 1, 'perPage' => 10, 'page' => 2]);
        $request->setContainer($this->app);
        $this->repository->shouldReceive('paginate')->with(2, 10)->once()->andReturn(
            new Paginator(new LengthAwarePaginator([], 0, 10, 2), $request)
        );

        $response = $this->controller->index($request);

        $this->assertEquals(200, $response->status());
    }
}
