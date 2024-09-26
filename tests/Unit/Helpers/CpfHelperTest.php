<?php

namespace Tests\Unit\Helpers;

use App\Http\Helpers\CpfHelper;
use Tests\TestCase;

class CpfHelperTest extends TestCase
{
    private CpfHelper $cpfHelper;

    public function setUp(): void
    {
        parent::setUp();
        $this->cpfHelper = new CpfHelper();
    }

    public function test_valid_cpf(): void
    {
        $cpf = $this->cpfHelper->generate();

        $this->assertTrue($this->cpfHelper->validate($cpf));
    }

    public function test_invalid_cpf(): void
    {
        $cpf = '12345678900'; // Replace with an invalid CPF for testing
        $this->assertFalse($this->cpfHelper->validate($cpf));
    }
}