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

        // $table->string('room');
        // $table->date('days');
        // $table->string('time');
        // $table->string('tittle');
        // $table->string('by');

        return [
           'tittle' => $this->faker->streetSuffix()  ,
            'room' => $this->faker->randomElement(['RR Sisda', 'RR PPK PP', 'RR KPSDA', 'RR PPK BMN', 'RR PPK PSDA']) ,
            'days' => $this->faker->dateTime(),
            'time' => $this->faker->randomElement(['9-selesai', '12-selesai', '15-selesai', '18-selesai', '21-selesai']) ,
            'by' => $this->faker->randomElement([' Sisda', 'PPK PP', 'KPSDA', 'PPK BMN', 'PPK PSDA']) ,
        ];
    }
}
