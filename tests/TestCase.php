<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
      parent::setUp();
      $this->seed('PermissionsSeeder');
    }

    public function loginAdmin()
    {
      $admin = User::factory()->create();

      $admin->assignRole('administrador');

      Auth::login($admin);
      return $admin;
    }

    public function criaFuncionario()
    {
      $funcionario = User::factory()->create();
      $funcionario->assignRole('funcionario');
      return $funcionario;
    }
}
