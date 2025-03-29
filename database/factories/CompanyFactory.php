<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Companies>
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
            'name'          => $this->faker->company,
            'vat'           => strtoupper(Str::random(10)),
            'type'          => $this->faker->numberBetween(1, 3),
            'with_contract' => $this->faker->boolean(70),
            'status'        => $this->faker->numberBetween(0, 1), 
            'address'       => $this->faker->address,
            'phone'         => $this->faker->optional()->phoneNumber, 
            'email'         => $this->faker->optional()->safeEmail,
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
