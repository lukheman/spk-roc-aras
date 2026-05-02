<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn'            => $this->faker->unique()->numerify('################'), // 16 digit NIK
            'nama'           => $this->faker->name(),
            'jenis_kelamin'  => $this->faker->randomElement(['L', 'P']),
            'tempat_lahir'   => $this->faker->city(),
            'tanggal_lahir'  => $this->faker->date('Y-m-d', '2010-12-31'), // contoh: anak usia sekolah
            'kelas'          => $this->faker->randomElement(['X', 'XI', 'XII']),
        ];
    }
}
