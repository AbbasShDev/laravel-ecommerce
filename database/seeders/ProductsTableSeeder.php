<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Laptops
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name'        => 'MacBook Pro ' . $i,
                'details'     => '15 inch, 1TB SSD, 32GB RAM' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!' . $i,
                'price'       => rand(99999, 399999),
                'category_id' => 1,
                'image'       => 'products/February2021/macbook-pro-'.$i.'.jpg'
            ]);
        }

        //Desktops
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name'        => 'HP 22 - AIO ' . $i,
                'details'     => 'AMD Ryzen 3, 21.5 inch, 4GB, 1TB, Jet Black ' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!' . $i,
                'price'       => rand(99999, 699999),
                'category_id' => 2,
                'image'       => 'products/February2021/hp-22-aio-'.$i.'.jpg'
            ]);
        }

        //Phones
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name'        => 'Apple iPhone 12 Pro Max ' . $i,
                'details'     => '5G, 512GB, Silver ' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!' . $i,
                'price'       => rand(199999, 599999),
                'category_id' => 3,
                'image'       => 'products/February2021/apple-iphone-12-pro-max-'.$i.'.jpg'
            ]);
        }

        //Tablets
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name'        => 'Apple iPad Pro 2020 ' . $i,
                'details'     => '11 inch, WiFi + Cellular, 1TB, Space Grey ' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!' . $i,
                'price'       => rand(99999, 69999),
                'category_id' => 4,
                'image'       => 'products/February2021/apple-ipad-pro-2020-'.$i.'.jpg'
            ]);
        }

        //TVs
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name'        => 'LG TV ' . $i,
                'details'     => '65 Inch, 4K HDR Smart, NanoCell TV ' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!' . $i,
                'price'       => rand(399999, 89999),
                'category_id' => 5,
                'image'       => 'products/February2021/lg-tv-'.$i.'.jpg'
            ]);
        }

        //Cameras
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name'        => 'CANON EOS 800D ' . $i,
                'details'     => '24 Mega Pixels, 1/4000 Shutter Speed, WiFi, NFC, Full HD VIDEO, Black ' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!' . $i,
                'price'       => rand(299999, 69999),
                'category_id' => 6,
                'image'       => 'products/February2021/canon-eos-800d-'.$i.'.jpg'
            ]);
        }

        //Appliances
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name'        => 'Toshiba Inverter Refrigerator ' . $i,
                'details'     => '12.7 Cu.Ft, Silver Color ' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!' . $i,
                'price'       => rand(699999, 1009999),
                'category_id' => 7,
                'image'       => 'products/February2021/toshiba-inverter-refrigerator-'.$i.'.jpg'
            ]);
        }
//        //Laptops
//        for ($i = 1; $i <= 9; $i++) {
//            Product::create([
//                'name'        => [
//                    'en' => 'MacBook Pro ' . $i,
//                    'ar' => $i . 'ماك بوك برو '
//                ],
//                'details'     => [
//                    'en' => '15 inch, 1TB SSD, 32GB RAM' . $i,
//                    'ar' => $i . 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام'
//                ],
//                'description' => [
//                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!' . $i,
//                    'ar' => $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض'
//                ],
//                'price'       => rand(99999, 399999),
//                'category_id' => 1
//            ]);
//        }
//
////Desktops
//        for ($i = 1; $i <= 9; $i++) {
//            Product::create([
//                'name'        => [
//                    'en' => 'HP 22 - AIO ' . $i,
//                    'ar' => $i . 'أتش بي22 '
//                ],
//                'details'     => [
//                    'en' => 'AMD Ryzen 3, 21.5 inch, 4GB, 1TB, Jet Black ' . $i,
//                    'ar' => $i . 'الكل في واحد، رايزن3، 21.5 بوصة، 4 جيجا، 1 تيرا، أسود '
//                ],
//                'description' => [
//                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! ' . $i,
//                    'ar' => $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//                ],
//                'price'       => rand(99999, 699999),
//                'category_id' => 2
//            ]);
//        }
//
////Phones
//        for ($i = 1; $i <= 9; $i++) {
//            Product::create([
//                'name'        => [
//                    'en' => 'Apple iPhone 12 Pro Max ' . $i,
//                    'ar' => $i . 'آبل أيفون 12 برو ماكس '
//                ],
//                'details'     => [
//                    'en' => '5G, 512GB, Silver ' . $i,
//                    'ar' => $i . ' 5 جي ، 512 جيجا ، فضي '
//                ],
//                'description' => [
//                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! ' . $i,
//                    'ar' => $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//                ],
//                'price'       => rand(199999, 599999),
//                'category_id' => 3
//            ]);
//        }
//
////Tablets
//        for ($i = 1; $i <= 9; $i++) {
//            Product::create([
//                'name'        => [
//                    'en' => 'Apple iPad Pro 2020 ' . $i,
//                    'ar' => $i . 'أبل أيباد برو 2020 '
//                ],
//                'details'     => [
//                    'en' => '11 inch, WiFi + Cellular, 1TB, Space Grey ' . $i,
//                    'ar' => $i . '11 بوصة، واي فاي 4 جي، 1 تيرا، رمادي '
//                ],
//                'description' => [
//                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! ' . $i,
//                    'ar' => $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//                ],
//                'price'       => rand(99999, 69999),
//                'category_id' => 4
//            ]);
//        }
//
////TVs
//        for ($i = 1; $i <= 9; $i++) {
//            Product::create([
//                'name'        => [
//                    'en' => 'LG TV ' . $i,
//                    'ar' => $i . 'ال جي، تلفزيون '
//                ],
//                'details'     => [
//                    'en' => '65 Inch, 4K HDR Smart, NanoCell TV ' . $i,
//                    'ar' => $i . '1165 بوصة، ذكي، فائق الوضوح '
//                ],
//                'description' => [
//                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! ' . $i,
//                    'ar' => $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//                ],
//                'price'       => rand(399999, 89999),
//                'category_id' => 5
//            ]);
//        }
//
////Cameras
//        for ($i = 1; $i <= 9; $i++) {
//            Product::create([
//                'name'        => [
//                    'en' => 'CANON EOS 800D ' . $i,
//                    'ar' => $i . 'كانون كاميرا 800دي '
//                ],
//                'details'     => [
//                    'en' => '24 Mega Pixels, 1/4000 Shutter Speed, WiFi, NFC, Full HD VIDEO, Black ' . $i,
//                    'ar' => $i . '24 ميجابيكسل, بعدسه 18-55, تصوير فيديو عالى الدقه. شاشة 3 بوصة لمس, لون أسود '
//                ],
//                'description' => [
//                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! ' . $i,
//                    'ar' => $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//                ],
//                'price'       => rand(299999, 69999),
//                'category_id' => 6
//            ]);
//        }
//
////Appliances
//        for ($i = 1; $i <= 9; $i++) {
//            Product::create([
//                'name'        => [
//                    'en' => 'Toshiba Inverter Refrigerator ' . $i,
//                    'ar' => $i . 'توشيبا ثلاجة '
//                ],
//                'details'     => [
//                    'en' => '12.7 Cu.Ft, Silver Color ' . $i,
//                    'ar' => $i . '12.7 قدم،إنفيرتر، فضي '
//                ],
//                'description' => [
//                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! ' . $i,
//                    'ar' => $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض '
//                ],
//                'price'       => rand(699999, 1009999),
//                'category_id' => 7
//            ]);
//        }

//        /**
//         * Auto generated seed file.
//         *
//         * @return void
//         */
//        public function run()
//    {
//        $this->categoriesTranslations();
//        $this->productsTranslations();
//    }
//
//        /**
//         * Auto generate Categories Translations.
//         *
//         * @return void
//         */
//        private function categoriesTranslations()
//    {
//        // Adding translations for 'categories'
//        //
//        $cat = Category::where('slug', 'laptops')->firstOrFail();
//        if ($cat->exists) {
//            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'لابتوبات');
//        }
//
//        $cat = Category::where('slug', 'desktops')->firstOrFail();
//        if ($cat->exists) {
//            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'كمبيوترات مكتبية');
//        }
//
//        $cat = Category::where('slug', 'phones')->firstOrFail();
//        if ($cat->exists) {
//            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'جوالات');
//        }
//
//        $cat = Category::where('slug', 'tablets')->firstOrFail();
//        if ($cat->exists) {
//            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'تابلت');
//        }
//
//        $cat = Category::where('slug', 'tvs')->firstOrFail();
//        if ($cat->exists) {
//            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'تلفزيونات');
//        }
//
//        $cat = Category::where('slug', 'digital-cameras')->firstOrFail();
//        if ($cat->exists) {
//            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'كاميرات');
//        }
//
//        $cat = Category::where('slug', 'appliances')->firstOrFail();
//        if ($cat->exists) {
//            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'الاجهزة المنزلية');
//        }
//
//
//    }
//
//        /**
//         * Auto generate Products Translations.
//         *
//         * @return void
//         */
//        private function productsTranslations()
//    {
//        // Adding translations for 'products'
//        //
//        $cat = Category::where('slug', 'laptops')->firstOrFail();
//        if ($cat->exists) {
//            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'لابتوبات');
//        }
//
//        //Laptops
//        for ($i = 1; $i <= 9; $i++) {
//            $product = Product::where('slug', 'macBook-pro-' . $i)->firstOrFail();
//            if ($product->exists) {
//                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'ماك بوك برو ');
//                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام');
//                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
//            }
//        }
//
//        //Phones
//        for ($i = 1; $i <= 9; $i++) {
//            $product = Product::where('slug', 'apple-iphone-12-pro-max-' . $i)->firstOrFail();
//            if ($product->exists) {
//                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'آبل أيفون 12 برو ماكس');
//                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . ' 5 جي ، 512 جيجا ، فضي ');
//                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
//            }
//        }
//
//        //Tablets
//        for ($i = 1; $i <= 9; $i++) {
//            $product = Product::where('slug', 'apple-ipad-pro-2020-' . $i)->firstOrFail();
//            if ($product->exists) {
//                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'أبل أيباد برو 2020 ');
//                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . '11 بوصة، واي فاي 4 جي، 1 تيرا، رمادي ');
//                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
//            }
//        }
//
//        //TVs
//        for ($i = 1; $i <= 9; $i++) {
//            $product = Product::where('slug', 'lg-tv-' . $i)->firstOrFail();
//            if ($product->exists) {
//                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'ال جي، تلفزيون ');
//                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . '1165 بوصة، ذكي، فائق الوضوح ');
//                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
//            }
//        }
//
//        //Appliances
//        for ($i = 1; $i <= 9; $i++) {
//            $product = Product::where('slug', 'toshiba-inverter-refrigerator-' . $i)->firstOrFail();
//            if ($product->exists) {
//                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'توشيبا ثلاجة ');
//                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . '12.7 قدم،إنفيرتر، فضي ');
//                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
//            }
//        }
//
//    }


    }
}
