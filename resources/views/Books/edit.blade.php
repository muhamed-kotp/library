@extends('layout')

@section('title')
    Edit Book
@endsection

@section('content')
    @include('inc.errors')
    <div class="container"style="margin-bottom: 250px; margin-top: 50px">
        <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label class="form-label fs-1">Book title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') ?? $book->title }}">
                <div id="emailHelp" class="form-text">This will be the title of the Book </div>
            </div>
            <div class="mb-3">
                <label class="form-label fs-1">Book description</label>
                <input type="text" name="description" class="form-control"
                    value="{{ old('description') ?? $book->description }}">
                <div id="emailHelp" class="form-text">This will be the Description of the Book </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Image</label>
                <input class="form-control" type="file" name="img">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
