<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Đọc truyện online</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



    </head>
    <body>
    <div class="container">
            {{-------------------------- Menu --------------------------}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Dropdown
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                          Dropdown
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                        </div>
                      </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                          Dropdown
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                        </div>
                      </li>
                    @if (!Session::get('login_publiser'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-square-user"> </i>{{ Session::get('username') }}
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="{{ route('dang-xuat') }}"><i class="fa-solid fa-right-from-bracket"> </i> Đăng xuất</a>
                        </div>
                      </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
              </nav>
              {{-------------------------- Slide --------------------------}}

            <div class="owl-carousel owl-theme mt-5">
                <div class="item"><img src="{{ asset('uploads/truyen/p14361_p_v8_ac.jpg') }}"
                    style="width:230" >
                    <h3>Alladin và chiếc đèn thần</h3>
                    <p><i class="fa-solid fa-eye"> 123213123</i></p>
                </div>

                <div class="item"><img src="{{ asset('uploads/truyen/p14361_p_v8_ac.jpg') }}" >
                    <h3>Alladin và chiếc đèn thần</h3>
                    <p><i class="fa-solid fa-eye"> 123213123</i></p>
                </div>

                <div class="item"><img src="{{ asset('uploads/truyen/p14361_p_v8_ac.jpg') }}" >
                    <h3>Alladin và chiếc đèn thần</h3>
                    <p><i class="fa-solid fa-eye"> 123213123</i></p>
                </div>

                <div class="item"><img src="{{ asset('uploads/truyen/p14361_p_v8_ac.jpg') }}" >
                    <h3>Alladin và chiếc đèn thần</h3>
                    <p><i class="fa-solid fa-eye"> 123213123</i></p>
                </div>

                <div class="item"><img src="{{ asset('uploads/truyen/p14361_p_v8_ac.jpg') }}" >
                    <h3>Alladin và chiếc đèn thần</h3>
                    <p><i class="fa-solid fa-eye"> 123213123</i></p>
                 </div>
            </div>

            {{-------------------------- Truyện mới --------------------------}}
            <h3>Truyện mới cập nhật</h3>
            <div class="album py-5 bg-body-tertiary">
                <div class="container">

                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                      <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" data-src="{{ asset('uploads/truyen/p14361_p_v8_ac.jpg') }}" role="img" aria-label="" preserveAspectRatio=" slice" focusable="false"><title></title><rect width="100%" height="100%" fill=""></rect><text x="50%" y="50%" fill="" dy=".3em"></text></svg>
                        <div class="card-body">
                          <p class="card-text"></p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                          </div>
                        </div>
                      </div>
                    </div>




                  </div>
                </div>
              </div>

    </div>


        {{-- <script src="{{ asset('resource/css/app.css') }}" ></script>

        <link rel="stylesheet" href="{{ asset('js/jquery.min.js') }}"> --}}
         {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <link rel="stylesheet" href="{{ asset('public/js/bootstrap.min.js') }}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <script src="{{ asset('resource/js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('public/js/owl.carousel.js') }}">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                // nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
        </script>
  </body>
</html>
