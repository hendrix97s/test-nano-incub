<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        'nome' => 'Admin',
        'login' => 'admin@nanoincub.test',
        'senha' => Hash::make('123456'),
      ]);

      $admin->assignRole('administrador');
    }
}
