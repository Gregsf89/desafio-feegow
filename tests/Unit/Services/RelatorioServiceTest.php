<?php

namespace Tests\Unit\Services;

use App\Contracts\RelatorioRepositoryInterface;
use App\Services\RelatorioService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Mockery;
use Tests\TestCase;

class RelatorioServiceTest extends TestCase
{
    protected $relatorioService;
    protected $relatorioRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->relatorioRepositoryMock = Mockery::mock(RelatorioRepositoryInterface::class);
        $this->relatorioService = new RelatorioService($this->relatorioRepositoryMock);
    }

    public function testGetRelatorioPaginated(): void
    {
        $page = 1;
        $limit = 10;
        $vacinated = false;

        $paginatorMock = Mockery::mock(LengthAwarePaginator::class);

        $this->relatorioRepositoryMock
            ->shouldReceive('getRelatorioPaginated')
            ->with($page, $limit, $vacinated)
            ->andReturn($paginatorMock);

        $result = $this->relatorioService->getRelatorioPaginated($page, $limit, $vacinated);

        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
    }
}