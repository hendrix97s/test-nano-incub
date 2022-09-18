<?php

namespace Tests\Feature;

use App\Models\Movimentacao;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovimentacaoTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setUp();
  }

  /** @test */
  public function quando_criado_uma_movimentacao_relacionado_a_um_funcionario()
  {
    $this->withoutExceptionHandling();
    $this->loginAdmin();
    
    $funcionario = $this->criaFuncionario();

    Movimentacao::factory(3)->create([
      'funcionario_id' => $funcionario->id,
    ]);

    $this->assertCount(3, Movimentacao::all());
  }
}
