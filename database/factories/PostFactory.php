<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));

        return [
            'titulo' => fake()->sentence(),
            'contenido' => fake()->text(),
            'estado' => fake()->randomElement(['Publicado', 'Borrador']),
            'imagen' => "posts-images/".fake()->picsum("public/storage/posts-images/", 640, 480, false),
            'user_id' => User::all()->random()->id,
        ];
    }
}
