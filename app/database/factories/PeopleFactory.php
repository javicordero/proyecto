<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genders = ['masculino', 'femenino'];
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'image' => $this->faker->imageUrl(350, 350),
            'gender' => rand(0,1) ? 'masculino': 'femenino',
        ];
    }
}
