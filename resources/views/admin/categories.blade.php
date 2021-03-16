@extends('admin.layouts.main')
@section('title', 'Categories')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-9">
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->code}}</td>
                        <td>{{$category->title}}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('categories.show', $category) }}"
                                class="btn btn-sm btn-outline-success">Open</a>
                            <a href="{{ route('categories.edit', $category) }}"
                                class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{  route('categories.destroy', $category) }}" method="post"
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
            <a href="{{ route('categories.create') }}" type="submit" class="btn btn-sm btn-success">Create new
                category</a>
        </div>
    </div>

</div>
@endsection