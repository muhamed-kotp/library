@extends('layout')

@section('title')
    Add New note
@endsection

@section('content')
    @include('inc.errors')
    <div class="container">
        <form method="POST" action="{{ route('notes.store') }}">

            @csrf
            <div class="mb-3">
                <label class="form-label fs-1">Add New Note</label>
                <textarea type="text" name="content" class="form-control" value="{{ old('content') }}"></textarea>
                <div class="form-text">This will be Your own Note </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
