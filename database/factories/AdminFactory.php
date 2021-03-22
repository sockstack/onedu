<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'username' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$sSSYa4Da4xJM/IOhxrn08.gGjgEJhQUDN/fhYJqDiYPt4g4GyJLOO', // 123456
            'is_forbidden' => $this->faker->boolean,
        ];
    }
}
