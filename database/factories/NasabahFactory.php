<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nasabah>
 */
class NasabahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_rek'=> $this->faker->creditCardNumber(),
            'nama_nasabah'=> $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->sentence(100),
            'foto' => $this->faker->imageUrl($width = 200, $height = 200),
            'ktp' => $this->faker->imageUrl($width = 200, $height = 200),
            'status' => 1
        ];
    }
}
