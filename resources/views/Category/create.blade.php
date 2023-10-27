@extends('layout')

@section('title')
    Create Category
@endsection

@section('content')
    @include('inc.errors');
    <div class="container" style="margin-bottom: 250px; margin-top: 50px">
        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label class="form-label fs-1">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                <div class="form-text">This will be the name of the category </div>
            </div>
            <div class="mb-3">
                <label class="form-label fs-1">Category description</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                <div id="emailHelp" class="form-text">This will be the Description of the Book </div>
            </div>
            <div class="mb-3">
                <label class="form-label fs-1">Upload Image</label>
                <input class="form-control" type="file" name="img">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
