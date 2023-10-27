@extends('layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/categoryIndex.css') }}">
@endsection


@section('title')
    Categories
@endsection

@section('content')
    <div class="ist-cont mb-5">
        <div class= "content">
            <div class="img-title">Categories </div>
        </div>
        <div class="img-desc">Each type of book has a different audience, ideal word count, and price point. If you’re
            thinking about writing genre fiction, it’s a good idea to know the conventions for your chosen genre before you
            start writing or planning your book. </div>
    </div>


    <div class="Whole-first-cont">
        <div class="first-left-side">
            <div class="FLS-First-cont">
                <p class="p-style">Books</p>
                <p class="TheWorlds">The World's Biggest Open LiBrary </p>
                <p class="p-time-style fw-bold">The World of Watches in Time</p>
            </div>

            <div class="qutp-FLS">
                <div class="istBox-FRS">
                    <p class="BY">BY <span class="qutp">MOHAMED QUTP</span> />
                    <p class="date">Nov 1,2023</p>
                </div>

                <div class="scndBox-FRS">
                    <div style="width: 20%;"></div>
                    <div class="pCont-scndBox-FRS">
                        <p class="p-scndBox-FRS fw-bold">With nearly half of these bestsellers falling into the fantasy
                            genre, this is arguably the most popular type of book among readers. This is backed up by the
                            popularity of series like Harry Potter, Lord Of The Rings, and A Song Of Ice And Fire.
                        </p>
                    </div>
                </div>
            </div>

            <div class="hr">
                <hr class="line" />
            </div>

            <div class="Rolex-cont">
                <p class="Rolex">1. Adventure stories</p>
            </div>
            <div class="Rolex-hr">
                <hr class="Rolex-line" />
            </div>

            <div class="Rolex-LS-p-cont">
                <p class="Rolex-LS-p">
                    Adventure novels whisk readers off to faraway lands. Unlike fantasy novels, they tend to stay in the
                    real world (although there’s often a lot of crossover between these genres). Children’s novels often
                    fall into the adventure category, since they’re designed to spark imaginations.

                <div class="change-color-brown">Adventure story bestsellers:</div>

                <div class="change-Bold">- The Little Prince — Antoine de Saint-Exupéry</div>
                <div class="change-Bold">- She: A History of Adventure — H. Rider Haggard</div>
                <div class="change-Bold">- The Alchemist — Paulo Coelho</div>


            </div>

            <div class="LS-ist-img-cont">
                <img class="LS-ist-img" src="{{ asset('uploads/welcome/adv2.jpg') }}" alt="">
            </div>

            <div class="hr">
                <hr class="line" />
            </div>

            <div class="Rolex-cont">
                <p class="Rolex">2. Classics</p>
            </div>
            <div class="Rolex-hr">
                <hr class="Rolex-line" />
            </div>

            <div class="Rolex-LS-p-cont">
                <p class="Rolex-LS-p">Classics encompass a range of genres — but they always stand the test of time.
                    Classics include centuries-old stories like Homer’s Odyssey, but also more modern novels that have drawn
                    significant acclaim and attention, such Margaret Atwood’s The Handmaid’s Tale and George Orwell’s 1984.
                <div class="change-color-brown">Classic fiction bestsellers:</div>

                <div class="change-Bold">- A Tale Of Two Cities — Charles Dickens</div>
                <div class="change-Bold">- Dream Of The Red Chamber — Cao Xueqin</div>
                <div class="change-Bold">- The Catcher in the Rye — JD Salinger</div>

            </div>

            <div class="LS-ist-img-cont">
                <img class="LS-ist-img" src="{{ asset('uploads/welcome/classic2.jpg') }}" alt="">
            </div>
        </div>



        <div class="first-right-side">
            <div class="istBox-FRS ds-none">
                <p class="BY">BY <span class="qutp">MOHAMED QUTP</span> </>
                <p class="date">Nov 1,2023</p>
            </div>

            <div class="scndBox-FRS ds-none">
                <div style="width: 20%;"></div>
                <div class="pCont-scndBox-FRS">
                    <p class="p-scndBox-FRS fw-bold">With nearly half of these bestsellers falling into the fantasy genre,
                        this is arguably the most popular type of book among readers. This is backed up by the popularity of
                        series like Harry Potter, Lord Of The Rings, and A Song Of Ice And Fire.
                    </p>
                </div>
            </div>

            <div class="trdBox-FRS">
                <div class=" trdBox-FRS-title">
                    <div class="popular-cont">
                        <p class="popular">MOST POPULAR</p>
                    </div>
                    <div class="load">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </div>

                </div>
                <div class="pop-hr">
                    <hr class="pop-line" />
                </div>

                @foreach ($categories as $cat)
                    <div>
                        <p class="trdBox-FRS-p change-color-brown change-Bold mb-0">{{ $cat->name }}</p>
                    </div>
                    <div class="hand-img-cont">
                        <a href="{{ route('category.show', $cat->id) }}">
                            <img class="hand-img" src="{{ asset('uploads/categories/') }}/{{ $cat->img }}"
                                alt="">
                        </a>
                    </div>

                    <div>
                        <p class="trdBox-FRS-p">{{ $cat->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
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
