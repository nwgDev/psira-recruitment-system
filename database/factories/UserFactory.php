<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'              => fake()->firstName,
            'surname'           => fake()->lastName,
            'id_number'         => fake()->numerify('##########'),
            'cell_number'       => fake()->phoneNumber,
            'work_number'       => fake()->phoneNumber,
            'email'             => fake()->unique()->safeEmail,
            'home_address'      => fake()->address,
            'province_id'       => function () {
                                     return Province::inRandomOrder()->first()->id;
            },
            'code'              => fake()->randomNumber(4),
            'email_verified_at' => now(),
            'username'          => fake()->unique()->safeEmail,
            'password'          => Hash::make('Password'),
            'cv_link'                => fake()->filePath()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
