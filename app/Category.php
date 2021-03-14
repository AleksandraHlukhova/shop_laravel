<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    /**
     * show products that has this category
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
