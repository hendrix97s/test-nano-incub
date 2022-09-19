<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimentacao>
 */
class MovimentacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      return [
        'administrador_id' => User::class,
        'funcionario_id' => User::class,
        'tipo_movimentacao' => $this->faker->randomElement(['entrada', 'saida']),
        'valor' => $this->faker->randomFloat(2, 0, 100),
        'observacao' => $this->faker->sentence,
      ];
    }
}
