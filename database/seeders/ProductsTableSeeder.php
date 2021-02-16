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
            'en' => 'MacBook Pro 1',
            'ar' => 'ماك بوك برو 1'
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

        $product02['name'] = [
            'en' => 'MacBook Pro 2',
            'ar' => 'ماك بوك برو 1'
        ];
        $product02['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product02['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product02['price'] = 109999;

        $product03['name'] = [
            'en' => 'MacBook Pro 3',
            'ar' => 'ماك بوك برو 1'
        ];
        $product03['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product03['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product03['price'] = 299999;

        $product04['name'] = [
            'en' => 'MacBook Pro 4',
            'ar' => 'ماك بوك برو 1'
        ];
        $product04['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product04['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product04['price'] = 269999;

        $product05['name'] = [
            'en' => 'MacBook Pro 5',
            'ar' => 'ماك بوك برو 1'
        ];
        $product05['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product05['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product05['price'] = 239999;

        $product06['name'] = [
            'en' => 'MacBook Pro 6',
            'ar' => 'ماك بوك برو 1'
        ];
        $product06['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product06['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product06['price'] = 229999;

        $product07['name'] = [
            'en' => 'MacBook Pro 7',
            'ar' => 'ماك بوك برو 1'
        ];
        $product07['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product07['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product07['price'] = 169999;

        $product08['name'] = [
            'en' => 'MacBook Pro 8',
            'ar' => 'ماك بوك برو 1'
        ];
        $product08['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product08['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product08['price'] = 159999;

        $product09['name'] = [
            'en' => 'MacBook Pro 9',
            'ar' => 'ماك بوك برو 1'
        ];
        $product09['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product09['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product09['price'] = 149999;

        $product10['name'] = [
            'en' => 'MacBook Pro 10',
            'ar' => 'ماك بوك برو 1'
        ];
        $product10['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product10['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product10['price'] = 209999;

        $product11['name'] = [
            'en' => 'MacBook Pro 11',
            'ar' => 'ماك بوك برو 1'
        ];
        $product11['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product11['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product11['price'] = 189999;

        $product12['name'] = [
            'en' => 'MacBook Pro 12',
            'ar' => 'ماك بوك برو 1'
        ];
        $product12['details'] = [
            'en' => '15 inch, 1TB SSD, 32GB RAM',
            'ar' => 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
        ];
        $product12['description'] = [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'ar' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
        ];
        $product12['price'] = 129999;





        Product::create($product01);
        Product::create($product02);
        Product::create($product03);
        Product::create($product04);
        Product::create($product05);
        Product::create($product06);
        Product::create($product07);
        Product::create($product08);
        Product::create($product09);
        Product::create($product10);
        Product::create($product11);
        Product::create($product12);
    }
}
