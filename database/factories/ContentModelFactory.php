<?php

namespace Database\Factories;

use App\Common\Enum\ContentTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContentModel>
 */
class ContentModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'html' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(ContentTypeEnum::cases())
        ];
    }
}
