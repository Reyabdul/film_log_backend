<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Collection;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'iso' => $this->faker->sentence,
            'av' => $this->faker->sentence,
            'ss' => $this->faker->sentence,
            'notes' => $this->faker->paragraph,
            'collection_id' => Collection::all()->random(),
            'user_id' => User::all()->random(),
        ];
    }
}