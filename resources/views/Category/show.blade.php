@extends('layout')

@section('title')
    show category details
@endsection

@section('content')
    <div style="margin-bottom: 250px; margin-top: 50px">

        <div class=" container d-flex flex-column justify-content-center ">
            <h1> {{ $cat->name }}</h1>
            <h4>{{ $cat->description }}</h4>
        </div>

        <div class= "d-flex  row mx-3" style=" grid-column-gap: 20px; justify-content: center;">
            @foreach ($cat->books as $book)
                <div class="prod-col-cont">
                    <div class="brod-box">
                        <a href="{{ route('books.show', $book->id) }}">
                            <div class="card prod-img "
                                style="background-image: url('{{ asset('uploads/books/') }}/{{ $book->img }} ')">
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title prod-name fw-normal">{{ $book->title }}</h5>
                    </div>
                </div>
            @endforeach
        </div>



        <div class="d-flex justify-content-center">
            <a style="margin-bottom: 250px;" class="btn back_btn" href="{{ route('category.index') }}">Back</a>
        </div>
    @endsection
