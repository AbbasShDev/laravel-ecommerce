<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\Category;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->categoriesTranslations();
        $this->productsTranslations();
    }

    /**
     * Auto generate Categories Translations.
     *
     * @return void
     */
    private function categoriesTranslations()
    {
        // Adding translations for 'categories'
        //
        $cat = Category::where('slug', 'laptops')->firstOrFail();
        if ($cat->exists) {
            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'لابتوبات');
        }

        $cat = Category::where('slug', 'desktops')->firstOrFail();
        if ($cat->exists) {
            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'كمبيوترات مكتبية');
        }

        $cat = Category::where('slug', 'phones')->firstOrFail();
        if ($cat->exists) {
            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'جوالات');
        }

        $cat = Category::where('slug', 'tablets')->firstOrFail();
        if ($cat->exists) {
            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'تابلت');
        }

        $cat = Category::where('slug', 'tvs')->firstOrFail();
        if ($cat->exists) {
            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'تلفزيونات');
        }

        $cat = Category::where('slug', 'digital-cameras')->firstOrFail();
        if ($cat->exists) {
            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'كاميرات');
        }

        $cat = Category::where('slug', 'appliances')->firstOrFail();
        if ($cat->exists) {
            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'الاجهزة المنزلية');
        }


    }

    /**
     * Auto generate Products Translations.
     *
     * @return void
     */
    private function productsTranslations()
    {
        // Adding translations for 'products'
        //
        $cat = Category::where('slug', 'laptops')->firstOrFail();
        if ($cat->exists) {
            $this->trans('ar', $this->arr(['categories', 'name'], $cat->id), 'لابتوبات');
        }

        //Laptops
        for ($i = 1; $i <= 9; $i++) {
            $product = Product::where('slug', 'macBook-pro-' . $i)->firstOrFail();
            if ($product->exists) {
                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'ماك بوك برو ');
                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . 'ماك بوك برو15 بوصة ، 1 تيرا بايت SSD ، 32 جيجا رام');
                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
            }
        }

        //Desktops
        for ($i = 1; $i <= 9; $i++) {
            $product = Product::where('slug', 'hp-22-aio-' . $i)->firstOrFail();
            if ($product->exists) {
                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'أتش بي22 ');
                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . 'الكل في واحد، رايزن3، 21.5 بوصة، 4 جيجا، 1 تيرا، أسود ');
                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
            }
        }

        //Phones
        for ($i = 1; $i <= 9; $i++) {
            $product = Product::where('slug', 'apple-iphone-12-pro-max-' . $i)->firstOrFail();
            if ($product->exists) {
                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'آبل أيفون 12 برو ماكس');
                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . ' 5 جي ، 512 جيجا ، فضي ');
                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
            }
        }

        //Tablets
        for ($i = 1; $i <= 9; $i++) {
            $product = Product::where('slug', 'apple-ipad-pro-2020-' . $i)->firstOrFail();
            if ($product->exists) {
                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'أبل أيباد برو 2020 ');
                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . '11 بوصة، واي فاي 4 جي، 1 تيرا، رمادي ');
                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
            }
        }

        //Cameras
        for ($i = 1; $i <= 9; $i++) {
            $product = Product::where('slug', 'canon-eos-800d-' . $i)->firstOrFail();
            if ($product->exists) {
                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'كانون كاميرا 800دي ');
                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . '1124 ميجابيكسل, بعدسه 18-55, تصوير فيديو عالى الدقه. شاشة 3 بوصة لمس, لون أسود');
                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
            }
        }

        //TVs
        for ($i = 1; $i <= 9; $i++) {
            $product = Product::where('slug', 'lg-tv-' . $i)->firstOrFail();
            if ($product->exists) {
                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'ال جي، تلفزيون ');
                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . '1165 بوصة، ذكي، فائق الوضوح ');
                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
            }
        }

        //Appliances
        for ($i = 1; $i <= 9; $i++) {
            $product = Product::where('slug', 'toshiba-inverter-refrigerator-' . $i)->firstOrFail();
            if ($product->exists) {
                $this->trans('ar', $this->arr(['products', 'name'], $product->id), $i . 'توشيبا ثلاجة ');
                $this->trans('ar', $this->arr(['products', 'details'], $product->id), $i . '12.7 قدم،إنفيرتر، فضي ');
                $this->trans('ar', $this->arr(['products', 'description'], $product->id), $i . 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إض');
            }
        }

    }

    /**
     * Auto generate DataTypes Translations.
     *
     * @return void
     */
    private function dataTypesTranslations()
    {
        // Adding translations for 'display_name_singular'
        //
        $_fld = 'display_name_singular';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.post.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Post');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.page.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Página');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.user.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Utilizador');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.category.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Categoria');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.menu.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Menu');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.role.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Função');
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.post.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Posts');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.page.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Páginas');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.user.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Utilizadores');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.category.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Categorias');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.menu.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Menus');
        }
        $dtp = DataType::where($_fld, __('voyager::seeders.data_types.role.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Funções');
        }
    }

    /**
     * Auto generate Menus Translations.
     *
     * @return void
     */
    private function menusTranslations()
    {
        $_tpl = ['menu_items', 'title'];
        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.dashboard'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Painel de Controle');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.media'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Media');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.posts'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Publicações');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.users'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Utilizadores');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.categories'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Categorias');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.pages'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Páginas');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.roles'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Funções');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.tools'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Ferramentas');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.menu_builder'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Menus');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.database'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Base de dados');
        }

        $_item = $this->findMenuItem(__('voyager::seeders.menu_items.settings'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Configurações');
        }
    }

    private function findMenuItem($title)
    {
        return MenuItem::where('title', $title)->firstOrFail();
    }

    private function arr($par, $id)
    {
        return [
            'table_name'  => $par[0],
            'column_name' => $par[1],
            'foreign_key' => $id,
        ];
    }

    private function trans($lang, $keys, $value)
    {
        $_t = Translation::firstOrNew(array_merge($keys, [
            'locale' => $lang,
        ]));

        if (!$_t->exists) {
            $_t->fill(array_merge(
                $keys,
                ['value' => $value]
            ))->save();
        }
    }
}
