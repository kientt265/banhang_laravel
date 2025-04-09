<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 users
        $users = User::factory(5)->create();

        // Create 5 categories
        $categories = Category::factory(5)->create();

        // Create 20 products
        $products = Product::factory(20)->create([
            'category_id' => fn() => $categories->random()->id
        ]);

        // Create 10 customers
        $customers = Customer::factory(10)->create([
            'user_id' => fn() => $users->random()->id
        ]);

        // Create 15 orders with 1-3 order details each
        Order::factory(15)->create([
            'user_id' => fn() => $users->random()->id
        ])->each(function ($order) use ($products) {
            $orderProducts = $products->random(rand(1, 3));
            foreach ($orderProducts as $product) {
                OrderDetail::factory()->create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price
                ]);
            }
        });
    }
}
