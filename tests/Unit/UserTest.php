<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
      parent::setUp();
    }

    /** @test*/
    public function when_create_a_user()
    {
      $this->withoutExceptionHandling();
      User::factory()->create([
        'nome' => 'Teste',
        'login' => 'teste',
      ]);

      $this->assertDatabaseHas('users', [
        'nome' => 'Teste',
        'login' => 'teste',
      ]);
    }

    /** @test*/
    public function when_assign_role_to_administrator()
    {
      $admin = User::factory()->create([
        'nome' => 'admin',
        'login' => 'admin',
      ]);

      $admin->assignRole('administrador');

      $this->assertDatabaseHas('users', [
        'nome' => 'admin',
        'login' => 'admin',
      ]);

      $this->assertTrue($admin->hasRole('administrador'));
    }

    /** @test*/
    public function when_assign_role_to_employee()
    {
      $admin = User::factory()->create([
        'nome' => 'admin',
        'login' => 'admin',
        'senha' => bcrypt('password'),
      ]);

      $admin->assignRole('administrador');
      Auth::login($admin);
      Auth::user()->hasRole('administrador');

      $admin->assignRole('administrador');

      $employee = User::factory()->create([
        'nome' => 'employee',
        'login' => 'employee',
      ]);

      $employee->assignRole('funcionario');
      $this->assertTrue($employee->hasRole('funcionario'));
      $this->assertEquals($employee->administrador_id, $admin->id);


    }

    /** @test*/
    public function when_admin_get_employee_list()
    {
      $admin = User::factory()->create([
        'nome' => 'admin',
        'login' => 'admin',
        'senha' => bcrypt('password'),
      ]);

      $admin->assignRole('administrador');
      Auth::login($admin);
      Auth::user()->hasRole('administrador');

      $admin->assignRole('administrador');

      $employees = User::factory(3)->create([
        'nome' => 'employee',
      ]);

      foreach ($employees as $employee) {
        $employee->assignRole('funcionario');
      }

      $adm = User::find($admin->id);
      $adm->makeVisible('funcionarios');
      $this->assertEquals($adm->funcionarios->count(), 3);
    }
}
