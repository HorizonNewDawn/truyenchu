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
        {{-- <link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css') }}"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.3/assets/owl.theme.default.min.css" integrity="sha512-0AyL4lDHb+ytzn5Ygvvie+ThlNNVAoEQ6e/ZjP8Uoi+goYM1Wzb1VS3vga3ORrLXtyxflJ41bm6v1WY8m9gpdA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.3/assets/owl.carousel.min.css" integrity="sha512-PvcXHD+HohN3F7I/PQV6MQo4/1zeKqH/eN52sfqj2MrV45JwNBf76rGE0SYNfgvOUMQuv98XPx4ZPJLoraQcLw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
        <div class="container">
            {{-------------------------- Menu --------------------------}}
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{ url('/') }}">UpLightNovel</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Trang chủ</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục truyện
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ( $danhmuc as $key => $danh)
                          <li><a class="dropdown-item"
                            href="{{ url('danh-muc/'.$danh->slug_danhmuc) }}">{{ $danh->tendanhmuc }}</a></li>
                            @endforeach
                        </ul>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Thể loại
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ( $theloai as $key => $the)
                          <li><a class="dropdown-item"
                            href="{{ url('the-loai/'.$the->slug_theloai) }}">{{ $the->tentheloai }}</a></li>
                            @endforeach
                        </ul>
                      </li>
                    @if (!Session::get('login_publiser'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-hidden="true">Đăng nhập
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('dang-nhap') }}"><i class="fa-solid fa-user"> </i> Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="{{ route('dang-ky') }}"><i class="fa-solid fa-users"> </i> Đăng ký</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://www.youarecapital.com/wp-content/uploads/2021/12/ya-team-member-default-uai-172x258.jpg" width="20" height="30px" alt="">
                                <span>Cá nhân</span>
                            </a>
                            <ul class="dropdown-menu">
                                {{-- <li><a class="dropdown-item" href="#"><i class="fa-solid fa-list"> </i> Thông tin cá nhân </a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('theo-doi') }}"><i class="fa-regular fa-bookmark"> </i> Truyện theo dõi</a></li>
                                <li><a class="dropdown-item" href="{{ route('dang-xuat') }}"><i class="fa-solid fa-right-from-bracket"> </i> Đăng xuất</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                    <form autocomplete="off" class="d-flex" role="search" action="{{ url('tim-kiem') }}" method="POST">
                    @csrf
                      <input class="form-control me-2" id='keywords' name="tukhoa" type="search" placeholder="Tìm kiếm tác giả, truyện..." aria-label="Search">
                      <div id="search_ajax"></div>
                      <button class="btn btn-outline-dark" type="submit">Tìm</button>
                    </form>
                  </div>
                </div>
              </nav>
            {{-------------------------- Slide --------------------------}}
            {{-- <div class="owl-carousel owl-theme">
                <div class="item"><h4>1231231231</h4></div>
                <div class="item"><h4>2asfasdfasdfasdf</h4></div>
                <div class="item"><h4>353453452345</h4></div>
                <div class="item"><h4>4</h4></div>
                <div class="item"><h4>5</h4></div>
            </div> --}}
           @yield('content')


        </div>

        <div class="container mt-5">
                <p class="float-right">
                <a href="#"><i class="fa-solid fa-angles-up fa-2xl"></i></a>
                </p>
        </div>
        <footer class="text-muted">
            <div class="container mt-5">
                {{-- <p class="float-right">
                <a href="#"><i class="fa-solid fa-angles-up fa-2xl"></i></a>
                </p> --}}
                <p> © 2023 Up Light Novel - Đọc Light Novel Online</p>
            </div>
        </footer>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.3/owl.carousel.min.js" integrity="sha512-QAc08ipPd7ElgrEsKMj9mFi1LOYhEBBeusKfVSXktZSjlm5BIThey5q7IEYtZVixxC+lIN6CnSZCfI4s00Dq3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

        {{-- <link rel="stylesheet" href="{{ asset('public/js/owl.carousel.min.js') }}"> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}
        {{-- <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
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
        </script> --}}

    <script type="text/javascript" >
        $('#keywords').keyup(function(){
            var keywords = $(this).val();
            if(keywords != ''){
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{ url('/timkiem-ajax') }}",
                    method:"POST",
                    data:{keywords:keywords, _token:_token},
                    success:function(data){
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            }else{
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click','.li_search_ajax',function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
            });
        </script>

    <script type="text/javascript">
        $('.select-chapter').on('change',function(){
            var url = $(this).val();
            if(url){
                window.location= url;
            }
            return false;
        });
        current_chapter();

        function current_chapter(){
            var url = window.location.href;
            $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
        }
    </script>
    <script type="text/javascript">
        show_wishlist();
        function show_wishlist(){
            if(localStorage.getItem('wishlist_tr') != null){
                var data = JSON.parse(localStorage.getItem('wishlist_tr'));
                data.reverse();
                for(i=0;i<data.length;i++){
                    var title = data[i].title;
                    var img = data[i].img;
                    var id = data[i].id;
                    var url = data[i].url;

                    $('#theodoi').append (`
                        <div class="row col-mt-3 float-right" >
                            <div class= "col-md-2"> <img class="img img-responsive" width="150" height="180" class="card-img-top" src="`+img+`" alt="`+title+`" ></div>
                            <div class="col-md-3 sidebar">
                                <a href="`+url+`">
                                    <p>`+title+`</p>
                                </a>
                            </div>
                        </div>
                        `);
                }
            }
        }
        $('.btn-theodoi').click(function(){
            $('.fa.solid.fa.bookmark').css('color', 'dark');

            const id = $('.wishlist_id').val();
            const title = $('.wishlist_title').val();
            const img = $('.card-img-top').attr('src');
            const url = $('.wishlist_url').val();

            const item ={
                'id': id,
                'title': title,
                'img': img,
                'url':url
            }
            if(localStorage.getItem('wishlist_tr')==null){
                localStorage.setItem('wishlist_tr','[]');
            }
            var old_data = JSON.parse(localStorage.getItem('wishlist_tr'));
            var matches = $.grep(old_data, function(obj){
                return obj.id == id;
            })
            if(matches.length){
                alert('Bạn đã theo dõi truyện này rồi.');
            }else{
                if(old_data.length<=10){
                    old_data.push(item);
                }else{
                    alert("Không thể lưu truyện thêm truyện theo dõi")
                }
                $('#theodoi').append(`
                        <div class="row mt-3" >
                            <div class= "col-md-2"><img class="img img-responsive" width="150" height="180" class="card-img-top"
                                src="`+img+`" alt="`+title+`"></div>
                            <div class="col-md-3 sidebar">
                                <a href="`+url+`">
                                    <p>`+title+`</p>
                                </a>
                            </div>
                        </div>
                        `);
                localStorage.setItem('wishlist_tr', JSON.stringify(old_data));
                alert('Truyện đã được thêm vào danh sách theo dõi')
            }
            localStorage.setItem('wishlist_tr', JSON.stringify(old_data));
        });
    </script>
    <script>
        function themtheodoi(){
            // alert('Truyện đã được thêm vào danh sách theo dõi');
            var title = $('.btn-theodoitr').data('fl_title');
            var publisher_id = $('.btn-theodoitr').data('fl_publisher_id');
            var image = $('.btn-theodoitr').data('fl_image');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{ route('themtheodoi') }}',
                method: "POST",
                data: {title:title,image:image,publisher_id:publisher_id,_token:_token},
                success: function(data){
                    if(data=='Fail'){
                        alert('Truyện đã được theo dõi.');
                    }else{
                        alert('Theo dõi truyện thành công.');
                    }

                }
            });
        }
    </script>
    </body>
</html>
