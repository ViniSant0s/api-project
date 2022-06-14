<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Pagamento;

class PagamentoTest extends TestCase{

    public function testValor(){
        $pagamento = new Pagamento();

        $pagamento->Valor = 100;
        $this->assertEquals(100, $pagamento->Valor);

        $pagamento->Valor = 500;
        $this->assertEquals(500, $pagamento->Valor);

        $this->assertNotEquals(100, $pagamento->Valor);
    }

    public function testStatus(){
        $pagamento = new Pagamento();

        $pagamento->Status = false;
        $this->assertFalse($pagamento->Status);

        $pagamento->Status = true;
        $this->assertTrue($pagamento->Status);
    }
}