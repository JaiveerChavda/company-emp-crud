<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'profile' => $this->faker->imageUrl(75,75),
            'company_id' => Company::factory(),
            'designation_id' => $this->faker->randomElement([1,2]),
            'department_id' => $this->faker->randomElement([1,2]),
        ];
    }
}
