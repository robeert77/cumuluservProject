<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $scheduledDate = $this->faker->dateTimeBetween('-1 week', '+2 weeks');

        return [
            'user_id'        => User::inRandomOrder()->first()?->id ?? User::factory(),
            'company_id'     => Company::inRandomOrder()->first()?->id,
            'title'          => $this->faker->sentence(4),
            'description'    => $this->faker->paragraph(),
            'status'         => array_rand(Task::getStatuses()),
            'scheduled_date' => $scheduledDate->format('Y-m-d'),
            'completed_date' => $this->faker->optional()->dateTimeBetween($scheduledDate->modify('+1 day'), $scheduledDate->modify('+2 weeks')),
        ];
    }
}
