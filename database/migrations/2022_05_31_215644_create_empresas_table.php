<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CNPJ')->unique();
            $table->string('Razao_Social');
            $table->string('Nome_fantasia');
            $table->string('Telefone');
            $table->string('Email')->unique();
            $table->boolean('Conta_Valida')->default(false);
            $table->float('Saldo', 8, 2)->default(0.0);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
