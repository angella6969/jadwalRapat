<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'tittle' => $this->faker->streetSuffix()  ,
            'room' => $this->faker->randomElement(['Ruang Sisda', 'PPK PP', 'KPSDA', 'PPK BMN', 'PPK PSDA']) ,
            'start' => $this->faker->dateTime(),
            'end' => $this->faker->dateTime(),
        ];
    }
}
