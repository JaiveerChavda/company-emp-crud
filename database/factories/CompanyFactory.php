<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'logo' => $this->faker->imageUrl,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
        ];
    }
}
