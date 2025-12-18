<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professor>
 */
class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $minUnits = $this->faker->biasedNumberBetween(0, 10);
        $maxUnits = $this->faker->biasedNumberBetween(5, 15, 'exp');
        $minUnits = min($minUnits, $maxUnits);
        $maxUnits = max($minUnits, $maxUnits);
        return [
            'name' => $this->faker->firstName,
            'family' => $this->faker->lastName,
            'is_faculty_member' => $this->faker->boolean(10),
// sqrt(default): koochak
// log: khili koochak
// exp: big
            'min_units' => $minUnits,
            'max_units' => $maxUnits,
            'max_classes' => null,
            'status' => 'active',
        ];
    }
}
