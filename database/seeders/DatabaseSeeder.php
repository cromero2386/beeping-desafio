<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderLine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsSeeder::class);

        $this->call(OrdersSeeder::class);
    }
}
