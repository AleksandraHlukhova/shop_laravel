@extends('admin.layouts.main')
@section('title', "$product->title")

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection