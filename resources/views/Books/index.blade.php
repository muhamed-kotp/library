

@extends('layout')

@section('style')

<link rel="stylesheet" href="{{asset('css/booksIndex.css')}}">
@endsection

@section('title')

There alot og Books here
@endsection

@section('content')



<div class="container">

    <h2>All Books</h2>

    <a class="btn btn-dark" href="{{route('books.create')}}">Create a new record</a>

    @foreach($books as $book)
    <hr>
    <a href="{{route('books.show',$book->id)}}">
        <h3>{{$book->title}} </h3>

    </a>
    <h3>{{$book->description}} </h3>

    <a class="btn btn-danger" href="{{route('books.delete',$book->id)}}">Delete</a>
    <a class="btn btn-success" href="{{route('books.edit',$book->id)}}">Edit</a>
    <a class="btn btn-primary" href="{{route('books.show',$book->id)}}">Show</a>
    @endforeach

    @endsection
</div>



{{$books->render()}}
