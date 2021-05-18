<?php

namespace Database\Factories;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contract::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'people_id' => rand(1,15),
            'date_start' => $this->faker->dateTimeThisDecade(),
            'date_end' =>  $this->faker->dateTimeThisDecade()
        ];
    }
}
