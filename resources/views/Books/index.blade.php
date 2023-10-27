@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/booksIndex.css') }}">
@endsection

@section('title')
    There alot of Books here
@endsection

@section('content')
    <div class="ist-cont">
        <div class= "content">
            <div class="img-title">All Books In One Place </div>
        </div>
        <div class="img-desc">Welcome to the Open Library Curated Collections homepage! Here you will find a variety of
            collections spanning a wide range of topics, with the best part being every collection has been curated by a
            patron just like you! </div>
    </div>

    <div class="search-box">
        <div class="row g-3 align-items-center w-50">
            <div class="col-auto search-input-box">
                <input type="search" id="keyword" placeholder="Type To Search" aria-describedby="search"
                    onkeyup="search()">
                <label for="keyword" class="col-form-label"><i class="fa-solid fa-magnifying-glass"
                        style="color: #ff0044;"></i></label>
            </div>


        </div>
    </div>

    <div class="task-bar-cont">

    </div>

    {{-- Most read books --}}

    <div id="booksContainer" class= "d-flex row mx-3" style=" grid-column-gap: 20px; justify-content: center;">

        @foreach ($books as $book)
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
                    {{-- @auth
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger">delete</a>
                    @endauth --}}
                </div>
            </div>
        @endforeach
    </div>
@endsection


@section('script')
    <script>
        const search = () => {
            const key = document.getElementById("keyword").value;
            // console.log(key)
            let url = "{{ route('books.search') }}" +
                "?keyword=" + key;

            // console.log(url)
            let myrequest = new XMLHttpRequest();
            myrequest.open("GET", url)
            myrequest.send();
            myrequest.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {

                    let Data = JSON.parse(this.responseText);
                    let cont = document.getElementById('booksContainer');
                    cont.replaceChildren();

                    for (book of Data) {
                        let bigBox = document.createElement('div');
                        bigBox.classList.add("prod-col-cont");
                        let brodBox = document.createElement('div');
                        brodBox.classList.add("brod-box");
                        let link = document.createElement('a');
                        link.setAttribute("href", `/library/public/books/show/${book.id}`);
                        let prodImg = document.createElement('div');
                        prodImg.classList.add("card");
                        prodImg.classList.add("prod-img");
                        prodImg.setAttribute("style",
                            "background-image: url('/library/public/uploads/books/" + book.img + "')");
                        // let title = document.createElement('h3');

                        // title.appendChild(titleText);
                        // cont.appendChild(title);
                        link.appendChild(prodImg);
                        brodBox.appendChild(link);
                        bigBox.appendChild(brodBox);


                        let cardBody = document.createElement('div');
                        cardBody.classList.add("card-body");
                        let cardTitle = document.createElement('h5');
                        cardTitle.classList.add("prod-name");
                        let Title = document.createTextNode(book.title);

                        cardTitle.appendChild(Title)
                        cardBody.appendChild(cardTitle)
                        bigBox.appendChild(cardBody)
                        cont.appendChild(bigBox);

                    }

                }
            }
        }
    </script>
@endsection




{{-- <a href="{{ route('books.show', $book->id) }}"> --}}
{{-- <h3>{{ $book->title }} </h3> --}}
{{-- </a> --}}
{{-- <h3>{{ $book->description }} </h3> --}}

{{-- <a class="btn btn-danger" href="{{ route('books.delete', $book->id) }}">Delete</a>
                <a class="btn btn-success" href="{{ route('books.edit', $book->id) }}">Edit</a>
                <a class="btn btn-primary" href="{{ route('books.show', $book->id) }}">Show</a> --}}
