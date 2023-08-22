<?php

namespace Database\Factories;

use App\Models\User; // Sesuaikan dengan namespace model User Anda
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class; // Sesuaikan dengan model User Anda

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_nid' => $this->faker->unique()->user_nid, // Menggunakan userName untuk menghasilkan nama pengguna
            'password' => bcrypt('password'), // Menggunakan bcrypt untuk mengenkripsi kata sandi
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
