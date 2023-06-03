@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Chapter Truyện</div>

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

                    <form method="POST" action="{{ route('chapter.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 form-group">
                          <label for="exampleInputEmail1" class="form-label">Tên chapter</label>
                          <input type="text" class="form-control" value="{{ old('tieude') }}" onkeyup="ChangeToSlug();" name="tieude" id="slug" placeholder=""  aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug chapter</label>
                            <input type="text" class="form-control" value="{{ old('slug_chapter') }}" name="slug_chapter" id="convert_slug" placeholder=""  aria-describedby="emailHelp">
                          </div>
                        <div class="mb-3 form-group">
                          <label for="exampleInputPassword1" class="form-label">Nội dung chapter</label>
                            <textarea name="noidung" class="form-control" rows="5" style="resize:none"></textarea>
                        </div>

                        {{-- <div class="mb-3 form-group">
                            <label for="exampleInputPassword1" class="form-label">Danh mục truyện</label>
                            <select class="form-select mb-3" name="danhmuc_id" aria-label="Default select example">
                                @foreach ( $danhmuc as $key => $muc )
                                <option selected value="{{$muc -> id }}">{{$muc -> tendanhmuc }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        {{-- <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            </br>
                            <input type="file" class="form-control-file" name="hinh" >
                        </div> --}}

                        <div class="mb-3 form-group">
                            <label for="exampleInputPassword1" class="form-label">Thuộc truyện</label>
                            <select class="form-select mb-3" name="truyen_id" aria-label="Default select example">
                                @foreach ($truyen as $key => $value)
                                <option value="{{ $value -> id }}">{{ $value ->ten_tr }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputPassword1" class="form-label">Trạng thái kích hoạt</label>
                            <select class="form-select mb-3" name="kichhoat" aria-label="Default select example">
                                <option selected value="1">Kích hoạt</option>
                                <option value="0">Chưa kích hoạt</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-dark ">Thêm</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
