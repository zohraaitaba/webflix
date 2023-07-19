<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->sentence(3),
            //'avatar' => fake()-> imageUrl(),
            'avatar'=>'https://picsum.photos/seed/picsum/id/'.rand(0,1064).'/200/300', //400/800 taille image largeur/hauteur
            'birthday'=> fake()->date(),
        ];
    }
}
