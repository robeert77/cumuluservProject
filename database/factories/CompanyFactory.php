<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Companies>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->company,
            'vat'           => strtoupper(Str::random(10)),
            'type'          => array_rand(Company::getTypes()),
            'with_contract' => random_int(0, 1),
            'status'        => array_rand(Company::getStatuses()),
            'address'       => $this->faker->address,
            'phone'         => $this->faker->optional()->phoneNumber,
            'email'         => $this->faker->optional()->safeEmail,
            'details'       => "**" . $this->faker->sentence(6) . "**\n\n" .
                                "> " . $this->faker->sentence(10) . "\n\n" .
                                "- " . $this->faker->word() . "\n- " . $this->faker->word() . "\n\n" .
                                "`" . $this->faker->word() . "`" ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
