<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course> bc random_int
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        do {
            $practicalUnits = $this->faker->numberBetween(0, 3);
            $theoryUnits = $this->faker->numberBetween(0, 3);
            $equivalentUnits = $practicalUnits + $theoryUnits;
        } while ($equivalentUnits < 1 || $equivalentUnits >= 4);

        $duration = $equivalentUnits * 60;
        if ($equivalentUnits >= 3 && random_int(1, 2) > 1) {
            $duration = 4 * 60;
        }
        $code = uniqid();
        return [
            'name' => 'Co ' . ($duration / 60) . ' ' . $code,
            'code' => $code,
            'duration' => $duration, //minutes
            'practical_units' => $practicalUnits,
            'theory_units' => $theoryUnits,
            'equivalent_units' => $equivalentUnits,
        ];
    }
}
