<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Admin;

class AdminTest extends TestCase{

    public function testNovoAdmin(){
        $admin = new Admin();

        $admin->CPF = 99999999999;
        $admin->Nome = "Marcus Vinícius";
        $admin->Email = "marcus@gmail.com";
        $admin->Senha = "123456789";

        $this->assertEquals(99999999999, $admin->CPF);
        $this->assertEquals("Marcus Vinícius", $admin->Nome);
        $this->assertEquals("marcus@gmail.com", $admin->Email);
        $this->assertEquals("123456789", $admin->Senha);
    }
}