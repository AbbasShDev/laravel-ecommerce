<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Translation extends Model
{

    use Searchable;

    protected $table = 'translations';

    protected $fillable = ['table_name', 'column_name', 'foreign_key', 'locale', 'value'];

    public static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            $model->products->searchable();
        });
    }

    public function products(){
        return $this->hasMany(Product::class, 'id', 'foreign_key');
    }

}
