<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = ['sku', 'name', 'price', 'çategory', 'description'];

    public function categories() {
        return $this->belongsToMany('App\Category');
    }
}
