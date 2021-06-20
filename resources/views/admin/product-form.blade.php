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
                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
            @else
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @endisset
                    @csrf
                    <div class="form-group">
                        <label for="code">Add photo</label>
                        <input type="file" name="photo" class="form-control" id="code" placeholder="Enter description"
                            value="@isset($product) {{ $product->description }} @endisset">
                    </div>
                    <div class="form-group">
                        <label for="text">Title</label>
                        <input type="title" name="title" class="form-control" id="title" placeholder="Title"
                            value="{{ old('title', isset($product) ? $product->title : '') }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="code">Select the category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                @isset($product)
                                @if($category->id === $product->category_id)
                                selected
                                @endif
                                @endisset
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
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="code">Price</label>
                        <input type="text" name="price" class="form-control" id="code" placeholder="Enter price"
                            value="@isset($product) {{ $product->price }} @endisset">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
        </div>
    </div>

</div>
@endsection