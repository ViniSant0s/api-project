<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'Empresas';

    protected $fillable = ['id', 'CNPJ', 'Razão Social', 'Nome fantasia', 'Telefone', 'Email'];
}
