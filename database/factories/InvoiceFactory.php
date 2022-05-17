<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    const INVOICE_TITLES = ['Digi', 'Endesa Luz', 'Endesa Gas'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'     => self::INVOICE_TITLES[$this->faker->numberBetween(0, 2)],
            'quantity'  => $this->faker->numberBetween(0, 100)
        ];
    }
}
