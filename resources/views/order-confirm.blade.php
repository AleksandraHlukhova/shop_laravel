@extends('layouts.main')
@section('title', 'Confirm')

@section('content')
<div class="container">
    @include('partials.notification.danger')
    <h2>Подтвердите заказ:</h2>
    <small class="form-text text-muted">Ваш заказ на сумму {{ $order->getAllSumm() }}</small>
    <form action="{{ route('cart.confirm') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection