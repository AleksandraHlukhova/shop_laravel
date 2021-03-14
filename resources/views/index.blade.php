@extends('layouts.main')
@section('title', 'Home')

@section('content')
<main>

    <div class="album py-5 bg-light">
        <div class="container">
            @include('partials.notification.success')
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($products as $product)
                <div class="col">
                    @include('partials.card')
                </div>
                @endforeach
            </div>
        </div>
    </div>

</main>
@endsection