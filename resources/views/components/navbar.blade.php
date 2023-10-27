<div>
    <nav class="  navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand ms-5 nav-title" href="{{ route('welcome') }}">@lang('site.lib')</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="disabled nav-link active me-5 home-nav color-light" aria-current="page"
                                href="#">{{ Auth::user()->name }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active me-5 home-nav color-light" aria-current="page"
                                href="{{ route('auth.logout') }}">@lang('site.logout') </a>
                        </li>
                        <div class="dropdown me-3">
                            <a class=" nav-link active dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @lang('site.add')
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('books.create') }}">@lang('site.book')</a></li>
                                <li><a class="dropdown-item" href="{{ route('category.create') }}">@lang('site.cat')</a>
                                </li>
                            </ul>
                        </div>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link active  me-5 home-nav color-light" aria-current="page"
                                href="{{ route('auth.login') }}">@lang('site.login') </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active me-5 home-nav " aria-current="page"
                                href="{{ route('auth.register') }}">@lang('site.reg') </a>
                        </li>
                    @endguest
                    <div class="btn-group">
                        <a href="{{ route('category.index') }}" type="btn"
                            class="nav-link active  home-nav color-light">@lang('site.cats')</a>
                        <button type="button"
                            class="btn nav-link active  me-5 home-nav color-light dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-reference="parent">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            @foreach ($cats as $cat)
                                <li><a class="dropdown-item"
                                        href="{{ route('category.show', $cat->id) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- <li class="nav-item">
                <a class="nav-link active me-5 home-nav color-light" aria-current="page"
                    href="{{ route('category.index') }}">Categories</a>
            </li> --}}
                    @guest

                        <li class="nav-item">
                            <a class="nav-link active me-5 home-nav color-light" aria-current="page"
                                href="{{ route('welcome') }}">@lang('site.hom')</a>
                        </li>
                    @endguest


                    <div class="dropdown">
                        <a class=" nav-link active dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('site.langu')
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            <li><a class="dropdown-item" href="{{ route('lang.en') }}">@lang('site.en')</a></li>
                            <li><a class="dropdown-item" href="{{ route('lang.ar') }}">@lang('site.ar')</a></li>

                        </ul>
                    </div>

                </ul>
            </div>
        </div>
    </nav>

</div>
