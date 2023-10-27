@extends('layout')

@section('title')
    Edit Category
@endsection

@section('content')
    @include('inc.errors')
    <div class="container" style="margin-bottom: 250px; margin-top: 50px">
        <form method="POST" action="{{ route('category.update', $cat->id) }}" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label class="form-label fs-1">Category Name</label>
                <input placeholder="This will be the Name of the Category" type="text" name="name" class="form-control"
                    value="{{ $cat->name }}">

            </div>
            <div class="mb-3">
                <label class="form-label fs-1">Category description</label>
                <input type="text" placeholder="This will be the Description of the Category" name="description"
                    class="form-control" value="{{ old('description') ?? $cat->description }}">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label fs-1">Upload Image</label>
                <input class="form-control" type="file" name="img">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
