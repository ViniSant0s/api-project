<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Empresa;

class EmpresaTest extends TestCase{

    public function testNovaEmpresa(){
        $empresa = new Empresa();
        
        $empresa->CNPJ = 999999999999;
        $empresa->Razao_Social = "LOJAS AMERICANAS S.A.";
        $empresa->Nome_fantasia = "Americanas";
        $empresa->Telefone = "7599999999";
        $empresa->Email = "americanas@hotmail.com";
        $empresa->Conta_Valida = false;
        $empresa->Saldo = 0.00;

        $this->assertEquals(999999999999, $empresa->CNPJ);
        $this->assertEquals("LOJAS AMERICANAS S.A.", $empresa->Razao_Social);
        $this->assertEquals("Americanas", $empresa->Nome_fantasia);
        $this->assertEquals("7599999999", $empresa->Telefone);
        $this->assertEquals("americanas@hotmail.com", $empresa->Email);
        $this->assertFalse($empresa->Conta_Valida);
        $this->assertEquals(0.00, $empresa->Saldo);
    }

    public function testValidarConta(){
        $empresa = new Empresa();

        $empresa->Conta_Valida = false;
        $this->assertFalse($empresa->Conta_Valida);

        $empresa->Conta_Valida = true;
        $this->assertTrue($empresa->Conta_Valida);
    }

    public function testSaldo(){
        $empresa = new Empresa();

        $empresa->Saldo = 0.00;
        $this->assertEquals(0.00, $empresa->Saldo);

        $empresa->Saldo = 500.00;
        $this->assertEquals(500.00, $empresa->Saldo);
    }
}