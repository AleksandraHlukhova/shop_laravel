<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $fillable = [
        'title', 'category_id', 'description', 'price', 'created_at', 'updated_at'
    ];

    /**
     * get category that belongs the product
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * get products belongs to order
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

     /**
     * get product price
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getSumm()
    {
        return $this->price * $this->pivot->qty;
    }
}
