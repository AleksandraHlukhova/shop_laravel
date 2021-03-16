<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Controllers\Helpers\FlashMessage;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * show cart
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function cart()
    {
        $sessionId = session('sessionId');
        if(!is_null($sessionId))
        {
            $order = Order::find($sessionId);
            return view('cart', ['order' => $order]);

        }
        return view('cart');
    }

    /**
     * add to cart
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function cartAdd($product_id)
    {
        $sessionId = session('sessionId');
        if(is_null($sessionId))
        {
            $order = Order::create();
            session(['sessionId' => $order->id]);
        }
        else
        {
            $order = Order::find($sessionId);
        }
        if($order->products->contains($product_id))
        {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivotRow->qty ++;
            $pivotRow->update();
        }
        else
        {
            $order->products()->attach($product_id);
        }
        if(Auth::user())
        {
            $order->user_id = Auth::id();
            $order->save();
        }

        return redirect()->route('cart');
    }

     /**
     * remove from cart
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function cartRemove($product_id)
    {
        $sessionId = session('sessionId');
        if(!is_null($sessionId))
        {
            $order = Order::find($sessionId);
        }

        if($order->products->contains($product_id))
        {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            if($pivotRow->qty < 2)
            {
                $order->products()->detach($product_id);
            }
            else
            {
                $pivotRow->qty --;
                $pivotRow->update();
            }
        }

        return redirect()->route('cart');
    }

    /**
     * remove all qty of the product
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function cartRemoveAllProdQty($product_id)
    {
        $sessionId = session('sessionId');
        $order = Order::find($sessionId);
        $order->products()->detach($product_id);
        return redirect()->route('cart');
    }

    /**
     * cart confirm
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function cartConfirmForm()
    {
        $sessionId = session('sessionId');
        $order = Order::find($sessionId);

        return view('order-confirm', ['order' => $order]);
    }

    /**
     * cart confirm
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function cartConfirm(Request $request)
    {
        $sessionId = session('sessionId');
        $order = Order::find($sessionId);

        $success = $order->confirmOrder($request->name, $request->phone);
        if($success)
        {
            session()->forget('sessionId');
            FlashMessage::success('Your order was accepted!');
            return redirect()->route('home');
        }
        else
        {
            FlashMessage::danger('Try again!');
        }

        return redirect()->route('cart.cartConfirmForm');
    }
}