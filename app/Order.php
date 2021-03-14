<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order extends Model
{
    /**
     * get orders
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty')->withTimestamps();
    }

    /**
     * get product qty
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getQty()
    {
        $sum = 0;
        foreach($this->products as $product)
        {
            $sum += $product->pivot->qty;
        }
        return $sum;
    }

    /**
     * get product qty
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getAllSumm()
    {
        $sum = 0;
        foreach($this->products as $product)
        {
            $sum += $product->getSumm();
        }
        return $sum;
    }

    /**
     * confirm the order
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function confirmOrder($name, $phone)
    {

        $this->name = $name;
        $this->phone = $phone;
        $this->status = 1;
        if(!$this->save())
        {
            return false;
        }
        return true;

    }
}
