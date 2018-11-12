<?php


namespace V1\Tests\Unit\Http\Controllers;


use App\DAL\Contracts\TipRepository;
use App\Models\Tip;
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
    public function all_results_should_be_returned_if_pagination_is_not_required(): void
    {
        $this->repository->shouldReceive('all')->once()->andReturn(make(Tip::class, 5));

        $response = $this->controller->index(new IndexRequest());

        $this->assertEquals(200, $response->status());
    }
}
