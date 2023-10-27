@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/booksIndex.css') }}">
@endsection

@section('content')


    <div class="container " style="margin-bottom :250px; margin-top: 50px ">
        <div class=" row ">
            @if ($book !== null)
                <div class="col-lg-6 mt-5">
                    <img src="{{ asset('uploads/books/') }}/{{ $book->img }}" class="img-fluid ">
                </div>
                <div class="mt-5 col-lg-6">
                    <div class="ms-5">
                        <h4 class="fw-normal">{{ $book->title }}</h4>

                        <p>{{ $book->description }}</p>

                        <span class="fw-light"> Category :</span>
                        @foreach ($book->categories as $category)
                            <h5 class="fw-normal">{{ $category->name }} </h5>
                        @endforeach


                        @auth

                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger">delete</a>
                        @endauth

                        <div>
                            <a href="{{ route('category.index') }}" class="btn back_btn">Back</a>
                        </div>

                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection
