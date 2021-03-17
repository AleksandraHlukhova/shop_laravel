@extends('admin.layouts.main')
@section('title', 'Products')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-9">
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description at</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ Storage::url($product->photo) }}" alt="{{ $product->title }}" style="max-width:100%">
                                </div>
                            </div> 
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }} uah</td>
                        <td>
                            <a href="{{ route('products.show', $product) }}"
                                class="btn btn-sm btn-outline-success">Open</a>
                            <a href="{{ route('products.edit', $product) }}"
                                class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{  route('products.destroy', $product) }}" method="post"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('products.create') }}" type="submit" class="btn btn-sm btn-success">Create new
                product</a>
        </div>
    </div>
    
</div>
@endsection