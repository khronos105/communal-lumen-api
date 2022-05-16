<?php

namespace Database\Factories;

use App\Models\Doc;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doc::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'url'   => $this->faker->imageUrl(360, 360, 'animals', true, 'cats')
        ];
    }
}
