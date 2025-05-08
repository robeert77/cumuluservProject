<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intervention>
 */
class InterventionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = $this->faker->time('H:i');

        return [
            'company_id'    => Company::inRandomOrder()->first()?->id,
            'user_id'       => User::inRandomOrder()->first()?->id,
            'title'         => $this->faker->sentence(4),
            'description'   => $this->faker->paragraph(),
            'date'          => $this->faker->dateTimeBetween(Carbon::now()->startOfYear(), Carbon::now())->format('Y-m-d'),
            'start_time'    => $startTime,
            'end_time'      => $this->faker->time('H:i', date('H:i', strtotime($startTime . ' +3 hour'))),
        ];
    }
}
