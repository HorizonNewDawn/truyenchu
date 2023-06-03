@extends('../layout')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
    </ol>
  </nav>

<h3>Từ khóa bạn đang tìm: {{ $tukhoa }}</h3>
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @php
           $count = count($truyen);
        @endphp
        @if ($count == 0)
        <div class="col-md-3">
            <div class="card mb-3 box-shadow">
                <div class="card-body">
                    <p>Không tìm thấy truyện...</p>
                </div>
            </div>
        </div>
        @else

        @foreach ($truyen as $key=>$value )

        <div class="col-md-3">
          <div class="card mb-3 box-shadow">

                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{ asset('uploads/truyen/'.$value->hinh) }}" data-holder-rendered="true">
                <div class="card-body">
                    <h5>{{ $value ->ten_tr }}</h5>
                <p class="card-text">{{ $value ->tomtat }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="{{ url('xem-truyen/'.$value->slug_tr) }}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                    <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 2321312</a>
                    </div>
                    <small class="text-muted"> 9 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
