@extends('layout')

@section ('title')

Edit Book

@endsection

@section('content')


<div class="container">
<form method="POST" action="{{route('books.update', $book->id)}}" >

   @csrf
  <div class="mb-3">
    <label class="form-label fs-1" >Book title</label>
    <input type="text" name="title" class="form-control" value="{{$book->title}}" >
    <div id="emailHelp" class="form-text">This will be the title of the Book </div>
  </div>
  <div class="mb-3">
    <label  class="form-label fs-1">Book description</label>
    <input  type="text" name="description" class="form-control" value="{{$book->description}}" >
    <div id="emailHelp" class="form-text">This will be the Description of the Book </div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
