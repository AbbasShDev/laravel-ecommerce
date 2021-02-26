<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use TCG\Voyager\Traits\Translatable;

class Product extends Model {

    use HasFactory, Translatable, HasSlug, Searchable;


    protected $guarded = [];
    protected $translatable = ['name', 'details', 'description'];

    public function presentPrice()
    {
        return '$' . round($this->price / 100, 2);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * Load translations relation.
     *
     * @return mixed
     */
    public function translations()
    {
        return $this->hasMany(Translation::class, 'foreign_key', $this->getKeyName())
            ->where('table_name', $this->getTable())
            ->whereIn('locale', config('voyager.multilingual.locales', []));
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {

        return [
            'slug'  => $this->slug,
            'image' => $this->image,
            'price' => $this->price,
            'en'    => [
                'name'        => $this->name,
                'details'     => $this->details,
                'description' => $this->description,
            ],
            'ar'    => [
                'name'        => $this->translate('ar')->name,
                'details'     => $this->translate('ar')->details,
                'description' => $this->translate('ar')->description,
            ],
        ];
    }

}
