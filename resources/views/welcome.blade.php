<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Your Library</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Alumni+Sans+Collegiate+One&family=Oswald:wght@200&&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Alumni+Sans+Collegiate+One:ital@1&family=Great+Vibes&family=Lilita+One&family=Lobster&family=Nosifer&family=Oswald:wght@700&family=Pacifico&family=Sofia+Sans+Extra+Condensed:ital@1&display=swap"
        rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    <div class="ist-cont">
        <div class="welcome-nav container ">
            <a href="{{ route('category.index') }}" style="text-decoration: none">
                <h1 class="my-5">@lang('site.lib')</h1>
            </a>
            <div class="btn-cont">

                <div class="dropdown my-5 me-3">
                    <a class=" btn btn-outline-danger   dropdown-toggle" href="#" role="button"
                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('site.langu')
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('lang.en') }}">@lang('site.en')</a></li>
                        <li><a class="dropdown-item" href="{{ route('lang.ar') }}">@lang('site.ar')</a></li>
                    </ul>
                </div>
                <a href="{{ route('auth.login') }}" class="btn welcome-signin-btn ">@lang('site.sign')</a>
            </div>
        </div>

        <div class="container content">
            <h1 class="text-center">@lang('site.unlimeted') </h1>
            <div class="getStarted-box">
                <p>@lang('site.nomail') </p>
                <a class="btn default-btn" href="{{ route('auth.register') }}">@lang('site.start')</a>
            </div>
        </div>
    </div>

    <hr />
    <div class="d-flex enjoy-cont ">

        <div class="words-box mx-5" data-aos="fade-right">
            <h1 class="text-center">Enjoy Your Journey </h1>
            <h5 class="text-center">Libraries are often seen as a thing of the past, However, they are more important
                than ever before!
                Libraries are one of the most important instutions in our society. they provide everyone access to
                information and education, regardless of socioeconomic status or location. </h5>
        </div>

        <div class="img-box mx-5" data-aos="fade-left">
            <img class="enjoy-img" src="{{ asset('uploads/welcome/enjoy.jpg') }}" alt="">
        </div>
    </div>

    <hr />
    <div class="d-flex enjoy-cont ">


        <div class="img-box mx-5" data-aos="fade-right">
            <img class="enjoy-img" src="{{ asset('uploads/welcome/enjoy5.jpg') }}" alt="">
        </div>
        <div class="words-box mx-5" data-aos="fade-left">
            <h1 class="text-center">Libraries Help To Build Communities</h1>
            <h5 class="text-center">People come to libraries not only looking for information, but also, for finding
                themselves and their communities, One of the biggest values to be mentioned is that public libraries
                provide access to the arts for all visitors, normally free of charge. </h5>
        </div>
    </div>

    <hr />
    <div class="d-flex enjoy-cont ">

        <div class="words-box mx-5"data-aos="fade-right">
            <h1 class="text-center">Libraries Contribute To Increasing Economy</h1>
            <h5 class="text-center">Because libraries are free to use for patrons, not so many people consider the role
                they play in the economy. Public libraries provide access to information about business planning, market
                research and finance opportunities for entrepreneurs who are looking for spaces to network, conduct
                research. </h5>
        </div>

        <div class="img-box mx-5" data-aos="fade-left">
            <img class="enjoy-img" src="{{ asset('uploads/welcome/enjoy3 (2).jpg') }}" alt="">
        </div>
    </div>

    <hr />
    <div class="d-flex enjoy-cont ">

        <div class="img-box mx-5" data-aos="fade-right">
            <img class="enjoy-img" src="{{ asset('uploads/welcome/enjoy2.jpg') }}" alt="">
        </div>
        <div class="words-box mx-5" data-aos="fade-left">
            <h1 class="text-center">Libraries Foster Literacy</h1>
            <h5 class="text-center">Literacy is a critical factor in economic and social participation, removing
                barriers to education and employment, ublic libraries build healthy and productive communities by
                supporting all kinds of literacy, at all stages of life. </h5>
        </div>
    </div>

    <hr />

    <x-footer></x-footer>

    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    <script src="https://kit.fontawesome.com/d415d83558.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/typed.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    </script>

</body>

</html>
