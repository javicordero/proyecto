<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeThisYear(),
            'home' => $this->faker->boolean(),
            'played' => true,
            'opponent_id' => random_int(1,5),
            'opponent_points' => random_int(60,95),
            'team_id' => random_int(1,10),
        ];
    }
}
