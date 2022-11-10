<?php

namespace Database\Factories;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'instructor_id' => Instructor::all()->random()->id,
            'title' => $this->faker->randomElement(['Startup Training', 'Reach Up', 'Women Empowerment']),
            'description' => $this->faker->text,
        ];
    }
}
