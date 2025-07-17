<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    protected $model = Genre::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => fake()->unique()->name(),
               // 'email' => fake()->safeEmail(),
               // 'email_verified_at' => now(),
                //'password' => static::$password ??= Hash::make('password'),
                //'remember_token' => Str::random(10),
            
        ];
    }
}
