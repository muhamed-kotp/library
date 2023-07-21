<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  @yield('style')

 <div>
    <nav class="  navbar navbar-expand-lg navbar-dark bg-dark ">
      <div class="container-fluid">
        <a class="navbar-brand ms-5 nav-title" href="{{route('books.index')}}">LiBrary</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active me-5 home-nav color-light" aria-current="page" href="#">Home</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

</div>

  <div class="container py-5">
      @yield('style')

  </div>


</head>

<body>

@yield('content')

</body>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
</html>

