<?php

namespace Database\Factories;

use App\Models\TeamPracticeDay;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamPracticeDayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeamPracticeDay::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day' => random_int(1,5),
            'time' => $this->faker->time()
        ];
    }
}
