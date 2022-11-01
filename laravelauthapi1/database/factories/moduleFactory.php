<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



 
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
           'name' => $this->faker->name,
           'notes' => 'abebe beso bela chala chube chebete!'
        ];
    }
}
