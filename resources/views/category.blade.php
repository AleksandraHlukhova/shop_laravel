@extends('layouts.main')
@section('title', 'Category')

@section('content')
<div class="container">
    <h2>{{$category->title}}</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($category->products as $product)
        <div class="col">
            @include('partials.card')
        </div>
        @empty
        <p>No products</p>
        @endforelse
    </div>
</div>
@endsection