

@extends('layout')

@section('style')

<link rel="stylesheet" href="{{asset('css/booksIndex.css')}}">

@endsection

@section('content')


<div class="container">

    <h4> ID ------>{{$book->id}}</h4>
    <a >
    <h1>{{$book->title}}</h1>
    </a>
    <hr>

    <h2>{{$book->description}}</h2>
    <hr>
    <a href="{{route('books.index')}}"><button class="btn btn-danger">Back</button></a>

</div>

@endsection
