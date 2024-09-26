<?php

namespace Tests\Unit\Services;

use App\Contracts\FuncionarioRepositoryInterface;
use App\Models\Funcionario;
use App\Services\FuncionarioService;
use Tests\TestCase;

class FuncionarioServiceTest extends TestCase
{
    private $funcionarioService;
    private $repositoryInterface;

    protected function setUp(): void
    {
        $this->repositoryInterface = $this->createMock(FuncionarioRepositoryInterface::class);
        $this->funcionarioService = new FuncionarioService($this->repositoryInterface);
    }

    public function testGetFuncionarioByCpfReturnsFuncionario(): void
    {
        $cpf = '12345678900';
        $funcionario = new Funcionario();
        $funcionario->cpf = $cpf;

        $this->repositoryInterface
            ->expects($this->once())
            ->method('getFuncionarioByCpf')
            ->with($cpf)
            ->willReturn($funcionario);

        $result = $this->funcionarioService->getFuncionarioByCpf($cpf);

        $this->assertInstanceOf(Funcionario::class, $result);
        $this->assertEquals($cpf, $result->cpf);
    }

    public function testGetFuncionarioByCpfReturnsNull(): void
    {
        $cpf = '12345678900';

        $this->repositoryInterface
            ->expects($this->once())
            ->method('getFuncionarioByCpf')
            ->with($cpf)
            ->willReturn(null);

        $result = $this->funcionarioService->getFuncionarioByCpf($cpf);

        $this->assertNull($result);
    }
}