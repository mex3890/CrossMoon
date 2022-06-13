<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(150),
            'description' => $this->faker->text(),
            'user_id' => function () {
                User::createFakeUser();
                return User::find(rand(1, 50))->id;
            },
            'stat_id' => rand(1, 3),
            'category_id' => rand(1, 4),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => null
        ];
    }
}
