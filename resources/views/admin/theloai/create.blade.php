@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Thể Loại</div>

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

                    <form method="POST" action="{{ route('theloai.store') }}">
                        @csrf
                        <div class="mb-3 form-group">
                          <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                          <input type="text" class="form-control" value="{{ old('tentheloai') }}" onkeyup="ChangeToSlug();" name="tentheloai" id="slug" placeholder="Tên thể loại..."  aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug thể loại</label>
                            <input type="text" class="form-control" value="{{ old('slug_theloai') }}" name="slug_theloai" id="convert_slug" placeholder="Slug thể loại..."  aria-describedby="emailHelp">
                          </div>
                        <div class="mb-3 form-group">
                          <label for="exampleInputPassword1" class="form-label">Mô tả thể loại</label>
                          <input type="text" class="form-control" value="{{ old('mota') }}" name="mota" id="" placeholder="Mô tả thể loại...">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputPassword1" class="form-label">Tình trạng kích hoạt</label>
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
