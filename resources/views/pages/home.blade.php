@extends('../layout')
@section('content')
<h3>Truyện mới cập nhật</h3>
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @foreach ($truyen as $key=>$value )
        <div class="col-md-3">
            <div class="card mb-3 box-shadow">
                    <a href=""></a>
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{ asset('uploads/truyen/'.$value->hinh) }}" data-holder-rendered="true">
                    <div class="card-body">
                       <a href="{{ url('xem-truyen/'.$value->slug_tr) }}"> <h5>{{ $value ->ten_tr }}</h5></a>
                    {{-- <p class="card-text">{{ $value ->tomtat }}</p> --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a href="{{ url('xem-truyen/'.$value->slug_tr) }}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                        <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 2k</a>
                        </div>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
