@extends('layouts.main')
@section('title', 'Categories')

@section('content')
<div class="container">
    <div class="list-group">
        @foreach($categories as $category)
        <a href="{{ route('category', ['code' => $category->code]) }}"
            class="list-group-item list-group-item-action">{{ $category->title }}</a>
        @endforeach
    </div>
</div>
@endsection