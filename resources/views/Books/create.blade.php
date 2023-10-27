@extends('layout')

@section('title')
    Create Book
@endsection

@section('content')
    @include('inc.errors')
    <div class="container"style="margin-bottom: 250px; margin-top: 50px">
        <form enctype="multipart/form-data" method="POST" action="{{ route('books.store') }}">

            @csrf
            <div class="mb-3">
                <label class="form-label fs-1">Book title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                <div id="emailHelp" class="form-text">This will be the title of the Book </div>
            </div>
            <div class="mb-3">
                <label class="form-label fs-1">Book description</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                <div id="emailHelp" class="form-text">This will be the Description of the Book </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input class="form-control" type="file" name="img">
            </div>

            @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="category_ids[]">
                    <label class="form-check-label">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
