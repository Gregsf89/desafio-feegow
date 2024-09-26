<?php

namespace Tests\Unit\Services;

use App\Contracts\ComorbidadeRepositoryInterface;
use App\Services\ComorbidadeService;
use Tests\TestCase;

class ComorbidadeServiceTest extends TestCase
{
    private $comorbidadeService;
    private $repositoryMock;

    protected function setUp(): void
    {
        $this->repositoryMock = $this->createMock(ComorbidadeRepositoryInterface::class);
        $this->comorbidadeService = new ComorbidadeService($this->repositoryMock);
    }

    public function testGetAllReturnsArray(): void
    {
        $expectedResult = [
            ['id' => 1, 'name' => 'Comorbidade 1'],
            ['id' => 2, 'name' => 'Comorbidade 2']
        ];

        $this->repositoryMock->method('getAll')->willReturn($expectedResult);

        $result = $this->comorbidadeService->getAll();

        $this->assertIsArray($result);
        $this->assertEquals($expectedResult, $result);
    }
}