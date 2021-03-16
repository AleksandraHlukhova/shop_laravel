@extends('admin.layouts.main')
@isset($product)
@section('title', "Edit $product->title")
@else
@section('title', 'Create product')
@endisset

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            @isset($product)
            <h2 class="mb-4 mt-4">Edit <b>{{ $product->title }}</b></h2>
            @else
            <h2 class="mb-4 mt-4">Create new product</h2>
            @endisset
            <small class="form-text text-muted"></small>
            @isset($product)
                <form action="{{ route('products.update', $product) }}" method="POST">
                @method('PUT')
            @else
                <form action="{{ route('products.store') }}" method="POST">
            @endisset
                    @csrf
                    <div class="form-group">
                        <label for="text">Title</label>
                        <input type="title" name="title" class="form-control" id="title" placeholder="Title"
                            value="@isset($product) {{ $product->title }} @endisset">
                    </div>
                    <div class="form-group">
                        <label for="code">Select the category</label>
                        <select name="category" id="" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                @if($category->id === $product->category_id)
                                selected
                                @endif
                                >
                                {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code">Description</label>
                        <input type="text" name="description" class="form-control" id="code" placeholder="Enter description"
                            value="@isset($product) {{ $product->description }} @endisset">
                    </div>
                    <div class="form-group">
                        <label for="code">Price</label>
                        <input type="text" name="price" class="form-control" id="code" placeholder="Enter price"
                            value="@isset($product) {{ $product->price }} @endisset">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
        </div>
    </div>

</div>
@endsection