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

        //Laptops
        for ($i = 1; $i <= 9; $i++){
            Product::create([
                'name' => [
                    'en' => 'Laptops-'.$i,
                    'ar' => $i.'ماك بوك برو '
                ],
                'details'=> [
                    'en' => '15 inch, 1TB SSD, 32GB RAM'.$i,
                    'ar' => $i.'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
                ],
                'description' => [
                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!'.$i,
                    'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
                ],
                'price'=> rand(99999, 399999),
                'category_id' => 1
            ]);
        }

        //Desktops
        for ($i = 1; $i <= 9; $i++){
            Product::create([
                'name' => [
                    'en' => 'Desktops-'.$i,
                    'ar' => $i.'أتش بي22 '
                ],
                'details'=> [
                    'en' => 'AMD Ryzen 3, 21.5 inch, 4GB, 1TB, Jet Black '.$i,
                    'ar' => $i.'الكل في واحد، رايزن3، 21.5 بوصة، 4 جيجا، 1 تيرا، أسود '
                ],
                'description' => [
                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
                    'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
                ],
                'price'=> rand(99999, 699999),
                'category_id' => 2
            ]);
        }

        //Phones
        for ($i = 1; $i <= 9; $i++){
            Product::create([
                'name' => [
                    'en' => 'Phones-'.$i,
                    'ar' => $i.'آبل أيفون 12 برو ماكس '
                ],
                'details'=> [
                    'en' => '5G, 512GB, Silver '.$i,
                    'ar' => $i.' 5 جي ، 512 جيجا ، فضي '
                ],
                'description' => [
                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
                    'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
                ],
                'price'=> rand(199999, 599999),
                'category_id' => 3
            ]);
        }

        //Phones
        for ($i = 1; $i <= 9; $i++){
            Product::create([
                'name' => [
                    'en' => 'Tablets-'.$i,
                    'ar' => $i.'أبل أيباد برو 2020 '
                ],
                'details'=> [
                    'en' => '11 inch, WiFi + Cellular, 1TB, Space Grey '.$i,
                    'ar' => $i.'11 بوصة، واي فاي 4 جي، 1 تيرا، رمادي '
                ],
                'description' => [
                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
                    'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
                ],
                'price'=> rand(99999, 69999),
                'category_id' => 3
            ]);
        }

        //TVs
        for ($i = 1; $i <= 9; $i++){
            Product::create([
                'name' => [
                    'en' => 'TVs-'.$i,
                    'ar' => $i.'ال جي، تلفزيون '
                ],
                'details'=> [
                    'en' => '65 Inch, 4K HDR Smart, NanoCell TV '.$i,
                    'ar' => $i.'1165 بوصة، ذكي، فائق الوضوح '
                ],
                'description' => [
                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
                    'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
                ],
                'price'=> rand(99999, 69999),
                'category_id' => 3
            ]);
        }

        //Camers
        for ($i = 1; $i <= 9; $i++){
            Product::create([
                'name' => [
                    'en' => 'Digital Cameras-'.$i,
                    'ar' => $i.'كانون كاميرا 800دي '
                ],
                'details'=> [
                    'en' => '24 Mega Pixels, 1/4000 Shutter Speed, WiFi, NFC, Full HD VIDEO, Black '.$i,
                    'ar' => $i.'24 ميجابيكسل, بعدسه 18-55, تصوير فيديو عالى الدقه. شاشة 3 بوصة لمس, لون أسود '
                ],
                'description' => [
                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
                    'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
                ],
                'price'=> rand(99999, 69999),
                'category_id' => 3
            ]);
        }

        //Appliances
        for ($i = 1; $i <= 9; $i++){
            Product::create([
                'name' => [
                    'en' => 'Appliances-'.$i,
                    'ar' => $i.'توشيبا ثلاجة '
                ],
                'details'=> [
                    'en' => '12.7 Cu.Ft, Silver Color '.$i,
                    'ar' => $i.'12.7 قدم،إنفيرتر، فضي '
                ],
                'description' => [
                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
                    'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
                ],
                'price'=> rand(99999, 69999),
                'category_id' => 3
            ]);
        }

    }

//    //Laptops
//for ($i = 1; $i <= 9; $i++){
//Product::create([
//'name' => [
//'en' => 'MacBook Pro '.$i,
//'ar' => $i.'ماك بوك برو '
//],
//'details'=> [
//'en' => '15 inch, 1TB SSD, 32GB RAM'.$i,
//'ar' => $i.'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
//],
//'description' => [
//'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!'.$i,
//'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
//],
//'price'=> rand(99999, 399999),
//'category_id' => 1
//]);
//}
//
////Desktops
//for ($i = 1; $i <= 9; $i++){
//    Product::create([
//        'name' => [
//            'en' => 'HP 22 - AIO '.$i,
//            'ar' => $i.'أتش بي22 '
//        ],
//        'details'=> [
//            'en' => 'AMD Ryzen 3, 21.5 inch, 4GB, 1TB, Jet Black '.$i,
//            'ar' => $i.'الكل في واحد، رايزن3، 21.5 بوصة، 4 جيجا، 1 تيرا، أسود '
//        ],
//        'description' => [
//            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
//            'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//        ],
//        'price'=> rand(99999, 699999),
//        'category_id' => 2
//    ]);
//}
//
////Phones
//for ($i = 1; $i <= 9; $i++){
//    Product::create([
//        'name' => [
//            'en' => 'Apple iPhone 12 Pro Max '.$i,
//            'ar' => $i.'آبل أيفون 12 برو ماكس '
//        ],
//        'details'=> [
//            'en' => '5G, 512GB, Silver '.$i,
//            'ar' => $i.' 5 جي ، 512 جيجا ، فضي '
//        ],
//        'description' => [
//            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
//            'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//        ],
//        'price'=> rand(199999, 599999),
//        'category_id' => 3
//    ]);
//}
//
////Phones
//for ($i = 1; $i <= 9; $i++){
//    Product::create([
//        'name' => [
//            'en' => 'Apple iPad Pro 2020 '.$i,
//            'ar' => $i.'أبل أيباد برو 2020 '
//        ],
//        'details'=> [
//            'en' => '11 inch, WiFi + Cellular, 1TB, Space Grey '.$i,
//            'ar' => $i.'11 بوصة، واي فاي 4 جي، 1 تيرا، رمادي '
//        ],
//        'description' => [
//            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
//            'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//        ],
//        'price'=> rand(99999, 69999),
//        'category_id' => 3
//    ]);
//}
//
////TVs
//for ($i = 1; $i <= 9; $i++){
//    Product::create([
//        'name' => [
//            'en' => 'LG TV '.$i,
//            'ar' => $i.'ال جي، تلفزيون '
//        ],
//        'details'=> [
//            'en' => '65 Inch, 4K HDR Smart, NanoCell TV '.$i,
//            'ar' => $i.'1165 بوصة، ذكي، فائق الوضوح '
//        ],
//        'description' => [
//            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
//            'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//        ],
//        'price'=> rand(99999, 69999),
//        'category_id' => 3
//    ]);
//}
//
////Camers
//for ($i = 1; $i <= 9; $i++){
//    Product::create([
//        'name' => [
//            'en' => 'CANON EOS 800D '.$i,
//            'ar' => $i.'كانون كاميرا 800دي '
//        ],
//        'details'=> [
//            'en' => '24 Mega Pixels, 1/4000 Shutter Speed, WiFi, NFC, Full HD VIDEO, Black '.$i,
//            'ar' => $i.'24 ميجابيكسل, بعدسه 18-55, تصوير فيديو عالى الدقه. شاشة 3 بوصة لمس, لون أسود '
//        ],
//        'description' => [
//            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
//            'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//        ],
//        'price'=> rand(99999, 69999),
//        'category_id' => 3
//    ]);
//}
//
////Appliances
//for ($i = 1; $i <= 9; $i++){
//    Product::create([
//        'name' => [
//            'en' => 'Toshiba Inverter Refrigerator '.$i,
//            'ar' => $i.'توشيبا ثلاجة '
//        ],
//        'details'=> [
//            'en' => '12.7 Cu.Ft, Silver Color '.$i,
//            'ar' => $i.'12.7 قدم،إنفيرتر، فضي '
//        ],
//        'description' => [
//            'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! '.$i,
//            'ar' => $i.'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//        ],
//        'price'=> rand(99999, 69999),
//        'category_id' => 3
//    ]);
//}
//
//}
}
