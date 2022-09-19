<?php

namespace Database\Seeders;

use App\Models\Movimentacao;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin = User::factory()->create([
        'nome' => 'Luiz F. Lima',
        'login' => 'luiz.lima@nanoincub.com',
        'senha' => Hash::make('123456'),
      ]);

      Auth::login($admin);
      $admin->assignRole('administrador');
      $employees = User::factory(20)->create([
        'administrador_id' => $admin->id,
      ]);

      
      foreach ($employees as $employee) {
        $employee->assignRole('funcionario');
        Movimentacao::factory(10)->create([
          'funcionario_id' => $employee->id,
        ]);
      }

      Auth::logout();
    }
}
