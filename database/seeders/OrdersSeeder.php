<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderLine;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtén los 10 productos creados anteriormente
        $products = Product::take(10)->get();

        // Crear 20 órdenes con una cantidad aleatoria de líneas de pedido (de 1 a 5 líneas)
        Order::factory()
            ->count(20)
            ->create()
            ->each(function ($order) use ($products) {
                $productsForOrder = $products->shuffle(); // Mezclar los productos

                $lineCount = rand(1, $products->count()); // Definir el número de líneas

                for ($i = 0; $i < $lineCount; $i++) {
                    OrderLine::factory()->create([
                        'order_id' => $order->id,
                        'product_id' => $productsForOrder[$i]->id,
                    ]);
                }
            });
    }
}
