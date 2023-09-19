<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SDB>
 */
class SDBFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_sdb' => fake()->unique()->numberBetween(251,300),
            'ukuran' => 'besar',
            'no_kunci' => fake()->numberBetween(10000, 100000),
            'status' => 0
        ];
    }
}
