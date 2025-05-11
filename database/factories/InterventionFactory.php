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
        $startHour = random_int(7, 17);
        $startMinute = random_int(0, 59);
        $startTime = Carbon::createFromTime($startHour, $startMinute);

        $durationInMinutes = random_int(30, 240);
        $endTime = (clone $startTime)->addMinutes($durationInMinutes);

        return [
            'company_id'    => Company::inRandomOrder()->first()->id,
            'user_id'       => User::inRandomOrder()->first()->id,
            'title'         => $this->faker->sentence(4),
            'description'   => $this->faker->paragraph(),
            'date'          => $this->faker->dateTimeBetween('-2 months')->format('Y-m-d'),
            'start_time'    => $startTime->format('H:i'),
            'end_time'      => $endTime->format('H:i'),
        ];
    }
}
