<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'engine' => 'Unreal Engine 5',
            'description' => $this->faker->paragraph(),
            'status' => 'In Development',
        ];
    }
}
