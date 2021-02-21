<?php

namespace Database\Seeders;

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
