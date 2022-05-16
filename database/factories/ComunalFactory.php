<?php

namespace Database\Factories;

use App\Models\Comunal;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComunalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comunal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->date(),
            'date'  => $this->faker->imageUrl(360, 360, 'animals', true, 'cats')
        ];
    }
}
