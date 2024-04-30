<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href={{url("css/style.css")}}>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Home</a>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('products')}}">Products</a>
                  </li>



                  @if(Auth::user())
                  <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search" enctype="mulipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div  class="nav-item" id="right-align">
                        <button  class="btn btn-primary">Logout</button>

                    </div>
                    {{-- <button>Logout</button> --}}
                  </form>
                  @endif
                  </div>

              </div>
            </div>
          </nav>

    </header>
    @yield('name')

</body>
</html>
