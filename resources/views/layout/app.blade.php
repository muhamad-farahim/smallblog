<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/article.css') }}">
    @yield('css')
    <title>Document</title>


      
    @yield('internalcss');


</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Small Blog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="{{ Route::currentRouteNamed("global_blogs") ? "nav-link active" : "nav-link" }}"  href={{ route("global_blogs") }}>Home</a>
              </li>
              @auth
              <li class="nav-item">
                <a class="{{ Route::currentRouteNamed("my_blogs") ? "nav-link active" : "nav-link" }}" href={{ route("my_blogs") }}>My Blogs</a>
              </li>
              <li class="nav-item">
                <a class="{{ Route::currentRouteNamed("add_blog") ? "nav-link active" : "nav-link" }}" href={{ route("add_blog") }}>Create Blogs</a>
              </li>
              <li class="nav-item">
                <a class="{{ Route::currentRouteNamed("logout") ? "nav-link active" : "nav-link" }}" href={{ route("logout") }}>Log Out</a>
              </li>
              @endauth
              @guest
              <li class="nav-item">
                <a class="{{ Route::currentRouteNamed("login") ? "nav-link active" : "nav-link" }}" href={{ route("login") }}>Login</a>
              </li>
              <li class="nav-item">
                <a class="{{ Route::currentRouteNamed("signup") ? "nav-link active" : "nav-link" }}" href={{ route("signup") }}>Sign Up</a>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>

        @yield('content')

<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50 stick-to-bottom">
  <div class="footer-container text-center">
    <small>Copyright &copy; Your Website</small>
  </div>
</footer>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@yield('js')


</html>



