<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'grandfathername' => $this->faker->name, 
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'address' =>  $this->faker->address,
            'country' => $this->faker->country,
            'field_of_study' => $this->faker->randomElement(["Finance", 'Accounting', 'Marketing', 'Information Technology']),
            'level_of_study' =>  $this->faker->randomElement(["Bachelor's", 'Diploma', 'Masters', 'Doctorate']),
            'city' => $this->faker->city,
            'date_of_birth' =>  $this->faker->date,
            'phone_number' =>  $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'password' =>  $this->faker->password,
            'area_of_expertise' => $this->faker->randomElement(['trainer', 'motivator']),
         ];
    }
}
