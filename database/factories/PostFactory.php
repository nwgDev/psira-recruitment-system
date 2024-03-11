<?php

namespace Database\Factories;

use App\Models\Qualification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $businessUnits  = ['ICT', 'Human Capital', 'Law Enforcement', 'Finance'];
        $driversLicense = $this->faker->boolean();

        return [
            'name'                          => fake()->jobTitle,
            'job_description'               => fake()->paragraph(),
            'business_unit'                 => fake()->randomElement($businessUnits),
            'manager_name'                  => fake()->name(),
            'manager_email'                 => fake()->email(),
            'required_experience_in_years'  => fake()->numberBetween(1, 10),
            'qualification_id'              => Qualification::inRandomOrder()->first()->id,
            'drivers_license'               => $driversLicense ? 1 : 0,
            'opening_date'                  => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'closing_date'                  => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
        ];
    }
}
