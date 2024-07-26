<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class;
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
            'user_id' => User::factory(),
        ];
    }
}
