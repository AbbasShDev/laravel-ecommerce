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
    public function getSlugOptions() : SlugOptions
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
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {

        $collection = collect([
            'slug' => $this->slug,
            'image' => $this->image,
            'price' => $this->price,
            'en'    => [
                'name'        => $this->name,
                'details'     => $this->details,
                'description' => $this->description,
            ]
        ]);

        $trans = $this->translate('ar');

        $collection->put(
            'ar', [
            'name'        => $trans->name,
            'details'     => $trans->details,
            'description' => $trans->description,

        ]);


        $array = $collection->toArray();

        return $array;

    }
}
