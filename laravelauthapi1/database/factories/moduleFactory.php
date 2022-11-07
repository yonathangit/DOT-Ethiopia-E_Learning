<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;


 
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'course_id' =>  Course::all()->random()->id,
           'name' => $this->faker->name,
           'notes' => $this->faker->text,
           'youtube url' =>$this->faker->url
        ];
    }
}
