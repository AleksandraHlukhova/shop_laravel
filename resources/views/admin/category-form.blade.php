@extends('admin.layouts.main')
@isset($category)
@section('title', "Edit $category->title")
@else
@section('title', 'Create category')
@endisset

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            @isset($category)
            <h2 class="mb-4 mt-4">Edit <b>{{ $category->title }}</b></h2>
            @else
            <h2 class="mb-4 mt-4">Create new category</h2>
            @endisset
            <small class="form-text text-muted"></small>
            @isset($category)
                <form action="{{ route('categories.update', $category) }}" method="POST">
                @method('PUT')
            @else
                <form action="{{ route('categories.store') }}" method="POST">
            @endisset
                    @csrf
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="code" class="form-control" id="code" placeholder="Enter code"
                            value="@isset($category) {{ $category->code }} @endisset">
                    </div>
                    <div class="form-group">
                        <label for="text">Title</label>
                        <input type="title" name="title" class="form-control" id="title" placeholder="Title"
                            value="@isset($category) {{ $category->title }} @endisset">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
        </div>
    </div>

</div>
@endsection