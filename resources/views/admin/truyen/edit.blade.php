@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật Truyện</div>

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

                    <form method="POST" action="{{ route('truyen.update',[$truyen->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3 form-group">
                          <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                          <input type="text" class="form-control" value="{{ $truyen->ten_tr }}" onkeyup="ChangeToSlug();" name="ten_tr" id="slug" placeholder="Tên truyện..."  aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" value="{{ $truyen->tacgia }}"  name="tacgia"  placeholder="Tên tác giả..."  aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                            <input type="text" class="form-control" value="{{ $truyen->slug_tr }}" name="slug_tr" id="convert_slug" placeholder="Slug truyện..."  aria-describedby="emailHelp">
                          </div>
                        <div class="mb-3 form-group">
                          <label for="exampleInputPassword1" class="form-label">Tóm tắt truyện</label>
                            <textarea name="tomtat" class="form-control" rows="5" style="resize:none">{{ $truyen->tomtat }}</textarea>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputPassword1" class="form-label">Danh mục truyện</label><br>
                            @foreach ( $danhmuc as $key => $muc )
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" name="danhmuc[]" type="checkbox" id="muc_{{ $muc->id }}" value="{{ $muc->id }}">
                                <label class="form-check-label" for="{{ $muc->id }}">{{ $muc->tendanhmuc }}</label>
                                </div>
                                @endforeach
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputPassword1" class="form-label">Thể loại truyện</label><br>
                            @foreach ( $theloai as $key => $the )
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" name="theloai[]" type="checkbox" id="theloai_{{ $the->id }}" value="{{ $the->id }}">
                            <label class="form-check-label" for="{{ $the->id }}">{{ $the->tentheloai }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            </br>
                            <img src="{{ asset('uploads/truyen/'.$truyen->hinh) }}" height="250" width="180">
                            <input type="file" class="form-control-file" name="hinh" >
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputPassword1" class="form-label">Trạng thái kích hoạt</label>
                            <select class="form-select mb-3" name="kichhoat" aria-label="Default select example">
                                @if ($truyen->kichhoat ==0)
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
