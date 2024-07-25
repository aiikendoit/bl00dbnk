<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'patientIdNo' => $this->faker->uuid,
            'lastname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'middlename' => $this->faker->firstName, // using firstName for middlename as well
            'age' => $this->faker->numberBetween(0, 100), // generating random age between 0 and 100
            'gender' => $this->faker->randomElement(['male', 'female']),
            
        ];
    }
}
