@extends('admin.layouts.main')
@section('title', "{{$category->title}}")

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Title</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$category->code}}</td>
                        <td>{{ $category->title }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection