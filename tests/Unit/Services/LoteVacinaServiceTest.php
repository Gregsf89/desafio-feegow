<?php

namespace Tests\Unit\Services;

use App\Contracts\LoteVacinaRepositoryInterface;
use App\Models\LoteVacina;
use App\Services\LoteVacinaService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Tests\TestCase;

class LoteVacinaServiceTest extends TestCase
{
    private $repositoryInterface;
    private $loteVacinaService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repositoryInterface = $this->createMock(LoteVacinaRepositoryInterface::class);
        $this->loteVacinaService = new LoteVacinaService($this->repositoryInterface);
    }

    public function testCreate(): void
    {
        $data = [
            'lote_vacina_info' => 'test_info',
            'data_aplicacao' => '2023-10-01',
            'dose' => '1'
        ];

        $loteVacina = new LoteVacina();
        $loteVacina->id = strtoupper(Str::ulid());

        $this->repositoryInterface
            ->expects($this->once())
            ->method('create')
            ->with($this->arrayHasKey('id'))
            ->willReturn($loteVacina);

        $result = $this->loteVacinaService->create($data);

        $this->assertInstanceOf(LoteVacina::class, $result);
        $this->assertEquals($loteVacina->id, $result->id);
    }

    public function testCreateLoteFromFuncionario(): void
    {
        $dosesVacinaInfo = [
            [
                'lote_vacina_info' => [
                    'lote_vacina_info' => 'test_info',
                    'data_aplicacao' => '2023-10-01',
                    'dose' => '1'
                ],
                'data_aplicacao' => '2023-10-01',
                'dose' => '1'
            ]
        ];

        $loteVacina = new LoteVacina();
        $loteVacina->id = strtoupper(Str::ulid());

        $this->repositoryInterface
            ->expects($this->once())
            ->method('create')
            ->with($this->arrayHasKey('id'))
            ->willReturn($loteVacina);

        $result = $this->loteVacinaService->createLoteFromFuncionario($dosesVacinaInfo);

        $this->assertIsArray($result);
        $this->assertArrayHasKey($loteVacina->id, $result);
        $this->assertEquals(Carbon::parse('2023-10-01'), $result[$loteVacina->id]['data_aplicacao']);
        $this->assertEquals('1', $result[$loteVacina->id]['dose']);
    }

    public function testGetAll(): void
    {
        $collection = new Collection([new LoteVacina()]);

        $this->repositoryInterface
            ->expects($this->once())
            ->method('getAll')
            ->willReturn($collection);

        $result = $this->loteVacinaService->getAll();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function testGetLoteVacinaById(): void
    {
        $id = strtoupper(Str::ulid());
        $loteVacina = new LoteVacina();
        $loteVacina->id = $id;

        $this->repositoryInterface
            ->expects($this->once())
            ->method('getLoteVacinaById')
            ->with($id)
            ->willReturn($loteVacina);

        $result = $this->loteVacinaService->getLoteVacinaById($id);

        $this->assertInstanceOf(LoteVacina::class, $result);
        $this->assertEquals($id, $result->id);
    }
}