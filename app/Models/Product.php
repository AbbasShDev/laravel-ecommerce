<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use TCG\Voyager\Traits\Translatable;

class Product extends Model {

    use HasFactory, Translatable, HasSlug;

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
}
