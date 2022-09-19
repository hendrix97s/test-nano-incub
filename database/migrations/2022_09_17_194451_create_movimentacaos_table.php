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
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('administrador_id')->constrained('users');
            $table->foreignId('funcionario_id')->nullable()->constrained('users');
            $table->enum('tipo_movimentacao', ['entrada', 'saida']);
            $table->float('valor', 8, 2);
            $table->string('observacao')->nullable();
            $table->timestamp('data_criacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacaos');
    }
};
