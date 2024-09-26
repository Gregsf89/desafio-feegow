<?php

namespace Tests\Unit\Services;

use App\Contracts\TipoVacinaRepositoryInterface;
use App\Services\TipoVacinaService;
use Tests\TestCase;

class TipoVacinaServiceTest extends TestCase
{
    private $tipoVacinaService;
    private $tipoVacinaRepositoryMock;

    protected function setUp(): void
    {
        $this->tipoVacinaRepositoryMock = $this->createMock(TipoVacinaRepositoryInterface::class);
        $this->tipoVacinaService = new TipoVacinaService($this->tipoVacinaRepositoryMock);
    }

    public function testGetAllReturnsArray()
    {
        $expectedResult = [
            ['id' => 1, 'name' => 'Vacina A'],
            ['id' => 2, 'name' => 'Vacina B']
        ];

        $this->tipoVacinaRepositoryMock
            ->expects($this->once())
            ->method('getAll')
            ->willReturn($expectedResult);

        $result = $this->tipoVacinaService->getAll();

        $this->assertIsArray($result);
        $this->assertEquals($expectedResult, $result);
    }
}