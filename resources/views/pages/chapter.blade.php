@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
      <li class="breadcrumb-item"><a href="{{ url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc) }}">{{ $truyen_breadcrumb->danhmuctruyen->tendanhmuc }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $truyen_breadcrumb->ten_tr }}</li>
    </ol>
  </nav>

<div class="row">
    <div class="col-md-12">
        <h4>{{ $chapter->truyen->ten_tr }}</h4>
        <p>Chương hiện tại: {{ $chapter->tieude }}</p>
        <div class="col-md-5">
            <style type="text/css">
            .isDisabled{
                color: currentColor();
                pointer-events: none;
                opacity: 0.5;
                text-decoration: none;
            }
            </style>
            <a class="btn btn-dark mt-3 {{ $chapter->id==$min_id->id ?'isDisabled' : '' }}" href="{{ url('xem-chapter/'.$previous_chapter) }}"><i class="fa-solid fa-angle-left"></i></a>
            <a class="btn btn-dark mt-3 {{ $chapter->id==$max_id->id ?'isDisabled' : '' }}" id href="{{ url('xem-chapter/'.$next_chapter) }}"><i class="fa-solid fa-angle-right"></i></a>
            <div class="form-group">
                <label>Chọn chương</label>
                <select class="form-select select-chapter" name="select-chapter" >
                    @foreach ($all_chapter as $key=>$chap )
                    <option value="{{ url('xem-chapter/'.$chap->slug_chapter) }}">{{ $chap->tieude }}</option>
                    @endforeach
                </select>
            </div>
            <a class="btn btn-dark mt-3 {{ $chapter->id==$min_id->id ?'isDisabled' : '' }}" href="{{ url('xem-chapter/'.$previous_chapter) }}"><i class="fa-solid fa-angle-left"></i></a>
            <a class="btn btn-dark mt-3 {{ $chapter->id==$max_id->id ?'isDisabled' : '' }}" href="{{ url('xem-chapter/'.$next_chapter) }}"><i class="fa-solid fa-angle-right"></i></a>
            <div class="noidungchuong mt-3">
                {!! $chapter->noidung !!}
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Chọn chương</label>
                        <select class="form-select select-chapter" name="select-chapter" >
                            @foreach ($all_chapter as $key=>$chap )
                            <option value="{{ url('xem-chapter/'.$chap->slug_chapter) }}">{{ $chap->tieude }}</option>
                            @endforeach
                        </select>
                    </div>
                <p></p>
            </div>
            <h3>Lưu và chia sẻ truyện</h3>
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-discord"></i></a>
        </div>
    </div>
</div>

@endsection
