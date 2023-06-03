@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Danh Mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form method="POST" action="{{ route('theloai.update',[$theloai->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                          <input type="text" class="form-control" value="{{$theloai->tentheloai }}" onkeyup="ChangeToSlug();" name="tentheloai" id="slug" placeholder="Tên thể loại..."  aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Slug thể loại</label>
                            <input type="text" class="form-control" value="{{$theloai->slug_theloai }}" name="slug_theloai" id="convert_slug" placeholder="Slug thể loại...">
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Mô tả thể loại</label>
                          <input type="text" class="form-control" value="{{$theloai->mota }}" name="mota" id="" placeholder="Mô tả thể loại...">
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tình trạng kích hoạt</label>
                        <select class="form-select mb-3" name="kichhoat" aria-label="Default select example">
                            @if ($theloai->kichhoat ==0)
                            <option  value="1">Kích hoạt</option>
                            <option value="0">Chưa kích hoạt</option>
                            @else
                            <option selected value="1">Kích hoạt</option>
                            <option value="0">Chưa kích hoạt</option>
                            @endif
                        </select>
                        </div>

                        <button type="submit" class="btn btn-dark ">Cập nhật</button>
                      </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
