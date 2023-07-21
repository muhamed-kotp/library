@extends('layout')

@section ('title')

Create Book

@endsection

@section('content')


<div class="container">
<form method="POST" action="{{route('books.store')}}" >

   @csrf
  <div class="mb-3">
    <label class="form-label fs-1">Book title</label>
    <input type="text" name="title" class="form-control" >
    <div id="emailHelp" class="form-text">This will be the title of the Book </div>
  </div>
  <div class="mb-3">
    <label  class="form-label fs-1">Book description</label>
    <input  type="text" name="description" class="form-control" >
    <div id="emailHelp" class="form-text">This will be the Description of the Book </div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
