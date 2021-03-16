<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class HomeBanner extends Model {

    use HasFactory, Translatable;

    protected $translatable = ['product_name', 'product_price_description', 'product_stock_status'];

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
