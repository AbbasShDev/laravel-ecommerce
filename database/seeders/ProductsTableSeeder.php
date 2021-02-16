<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product01['name'] = [
            'en' => 'MacBook Pro',
            'ar' => 'ماك بوك برو'
        ];
        $product01['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product01['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product01['price'] = 249999;

        Product::create($product01);
    }
}
