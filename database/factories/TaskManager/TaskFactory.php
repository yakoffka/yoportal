<?php
declare(strict_types=1);

namespace Database\Factories\TaskManager;

use App\Enums\TaskManager\TaskStatusEnum;
use App\Models\TaskManager\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
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
        return [
            'from' => User::factory(),
            'to' => User::factory(),
            'status' => TaskStatusEnum::Draft,
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentences(),
            'due_date' => now()->addWeek(),
        ];
    }
}
