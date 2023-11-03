<?php

namespace Database\Factories;

use App\Models\OrderLine;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => function () {
                return factory(Order::class)->create()->id;
            },
            'product_id' => function () {
                return Product::inRandomOrder()->first()->id;
            },
            'qty' => $this->faker->numberBetween(1, 10),
        ];
    }
}

