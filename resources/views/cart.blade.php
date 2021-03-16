@extends('layouts.main')
@section('title', 'Cart')

@section('content')
<div class="container">
@if(isset($order))
@if(count($order->products) > 0)

        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('cart.add', $product) }}" class="btn btn-sm btn-outline-secondary">
                           +
                        </a>
                        {{ $product->pivot->qty }}
                        <a href="{{ route('cart.remove', $product) }}" class="btn btn-sm btn-outline-secondary">
                           -
                        </a>
                    </td>
                    <td><img src="" alt=""></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->getSumm() }}</td>
                    <td>
                        <a href="{{ route('cart.remove.all.prod.qty', $product) }}">
                            <i class='bx bx-trash'></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <th>Total qty:</th>
                    <td>{{ $order->getQty() }}</td>
                    <td></td>
                    <th>Total sum:</th>
                    <td>{{ $order->getAllSumm() }}</td>
                    <td></td>
                </tr>

            </tbody>
        </table>
    <a href="{{ route('cart.cartConfirmForm') }}" class="btn btn-sm btn-outline-secondary">Confirm the order</a>
@endif

@else
<p>Cart is empty!</p>
@endif
</div>
@endsection