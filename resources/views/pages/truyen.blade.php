@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
      <li class="breadcrumb-item"><a href="{{ url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $truyen->ten_tr }}</li>
    </ol>
  </nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
                <img class="card-img-top" src="{{ asset('uploads/truyen/'.$truyen->hinh) }}" alt="">
            </div>
            <div class="col-md-9">
                <style type="text/css">
                .infotruyen{
                    list-style: none;
                }
                </style>
                <ul class="infotruyen">
                    <input type="hidden" value="{{ $truyen->ten_tr }}" class="wishlist_title">
                    <input type="hidden" value="{{ \URL::current() }}" class="wishlist_url">
                    <input type="hidden" value="{{ $truyen->id }}" class="wishlist_id">

                    <li>Tên truyện: {{ $truyen->ten_tr }}</li>
                    <li>Tác giả: {{ $truyen->tacgia }}</li>
                    <li>Danh mục truyện: <a href="{{ url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a></li>
                    <li>Thể loại truyện: <a href="{{ url('the-loai/'.$truyen->theloai->slug_theloai) }}">{{ $truyen->theloai->tentheloai }}</a></li>
                    {{-- <li>Thể loại:</li> --}}
                    {{-- <li>Số chapter: </li> --}}
                    {{-- <li>Ngày đăng: {{ $truyen->created_at->diffForHumans() }}</li> --}}
                    {{-- <li>Lượt xem: </li> --}}
                    <li>Cập nhật từ: {{ \Carbon\Carbon::parse($truyen->created_at)->diffForHumans() }}</li>
                    {{-- <li><a href="#">Xem mục lục</a></li> --}}
                    @if ($chapter_dau)
                    <li class="mb-2 mt-2">
                        <form>
                            @csrf
                        <button type="button" onclick="return themtheodoi()"
                        data-fl_publisher_id="{{ Session::get('publisher_id') }}"
                        data-fl_title="{{ $truyen->ten_tr }}"
                        data-fl_image="{{ $truyen->hinh}}"

                        class="btn btn-primary btn-theodoitr"><i class="fa-solid fa-bookmark" aria-hidden="true"></i> Theo dõi</button>
                        </form>
                    </li>
                    <li>
                        <a href="{{ url('xem-chapter/'.$chapter_dau->slug_chapter) }}" class="btn btn-dark">Đọc từ đầu</a>
                        {{-- .$chapter_dau->truyen->slug_tr.'/' --}}
                        <a href="{{ url('xem-chapter/'.$chapter_moinhat->slug_chapter) }}" class="btn btn-dark">Đọc mới nhất</a>
                        {{-- $chapter_moinhat->truyen->slug_tr.'/'. --}}

                    </li>
                    @else
                    <li><a class="btn btn-danger">Đang cập nhật</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <hr class="border border-primary border-2 opacity-50">
        <div class="col-md-12 tomtat-truyen">
            <h4><i class="fa-regular fa-file-lines"></i> Tóm tắt:</h4>
            <p>{!! $truyen->tomtat !!}</p>
        </div>

        <hr class="border border-primary border-2 opacity-50">
        <h4><i class="fa-solid fa-list"></i> Mục lục</h4>
        <ul class="mucluctruyen">
            @php
                $mucluc= count($chapter);
            @endphp
            @if ($mucluc>0)
                @foreach ($chapter as $key => $chap)
                <li><a href="{{ url('xem-chapter/'.$chap->slug_chapter) }}">{{ $chap->tieude }}</a></li>
                @endforeach
            @else
                <li>Mục lục đang cập nhật</li>
            @endif
        </ul>
        <hr class="border border-primary border-2 opacity-50">
        <h4>Truyện cùng danh mục</h4>
        <div class="row">
            @foreach ($cungdanhmuc as $key=>$value )
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                        <a href=""></a>
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{ asset('uploads/truyen/'.$value->hinh) }}" data-holder-rendered="true">
                        <div class="card-body">
                            <h5>{{ $value ->ten_tr }}</h5>
                        <p class="card-text">{{ $value ->tomtat }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="{{ url('xem-truyen/'.$value->slug_tr) }}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                            <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 2k</a>
                            </div>
                            <small class="text-muted"> {{ \Carbon\Carbon::parse($truyen->created_at)->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="col-md-3">
    <h3>Danh mục truyện</h3>
    </div> --}}
    <div class="container md-3">
        {{-- <h3>Truyện mới cập nhật</h3> --}}
        {{-- @foreach ($truyentr_sidebar as $key =>$tr )
        <div class="row-mt-2">
            <div class="col-md-5">
                <img class="img img-responsive" width="100%" class="card-img-top" src="{{ asset('/uploads/truyen/'.$tr->hinh) }}" alt="{{ $tr->ten_tr }}"></div>
            <div class="col-md-7 sidebar">
                <a href="{{ url('xem-truyen/'.$tr->slug_tr) }}">
                <p>{{ $tr->ten_tr }}</p>
                <p><i class="fa-solid fa-eye"></i></p>
                </a>
            </div>
        </div>
        @endforeach --}}
        <h3 class="title_tr" class="card-header">Truyện theo dõi</h3>
        <div id="theodoi"></div>
    </div>
</div>
@endsection
