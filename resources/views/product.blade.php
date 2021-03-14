@extends('layouts.main')
@section('title', 'Product')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
            @include('partials.card')
        </div>
    </div>
</div>
@endsection