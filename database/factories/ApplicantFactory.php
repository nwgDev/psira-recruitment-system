<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Qualification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user           = User::inRandomOrder()->first();
        $post           = Post::inRandomOrder()->first();
        $qualification  = Qualification::inRandomOrder()->first();

        return [
            'user_id'                   => $user->id,
            'post_id'                   => $post->id,
            'qualification_id'          => $qualification->id,
            'drivers_license'           => fake()->randomElement(['Yes', 'No']),
            'current_position'          => fake()->jobTitle,
            'company_name'              => fake()->company,
            'number_year_employed'      => fake()->numberBetween(1, 10),
            'current_annual_salary_ctc' => fake()->randomFloat(2, 10000, 100000),
            'previous_position'         => fake()->jobTitle,
            'previous_company'          => fake()->company,
            'period_from'               => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'period_to'                 => fake()->dateTimeBetween('-1 years', 'now')->format('Y-m-d'),
            'total_experience_in_years' => fake()->numberBetween(1, 15),
        ];
    }
}
