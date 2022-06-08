<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'Empresas';

    protected $fillable = ['id', 'CNPJ', 'Razao_Social', 'Nome_fantasia', 'Telefone', 'Email', 'Conta_Valida', 'Saldo'];
}
