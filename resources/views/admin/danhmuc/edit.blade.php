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

                    <form method="POST" action="{{ route('danhmuc.update',[$danhmuc->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                          <input type="text" class="form-control" value="{{ $danhmuc->tendanhmuc }}" onkeyup="ChangeToSlug();" name="tendanhmuc" id="slug" placeholder="Tên danh mục..."  aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Slug danh mục</label>
                            <input type="text" class="form-control" value="{{ $danhmuc->slug_danhmuc }}" name="slug_danhmuc" id="convert_slug" placeholder="Slug danh mục...">
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Mô tả danh mục</label>
                          <input type="text" class="form-control" value="{{ $danhmuc->mota }}" name="mota" id="" placeholder="Mô tả danh mục...">
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Kích hoạt</label>
                        <select class="form-select mb-3" name="kichhoat" aria-label="Default select example">
                            @if ($danhmuc->kichhoat ==0)
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
