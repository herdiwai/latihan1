<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['productid','name','category_id','price','description'];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
