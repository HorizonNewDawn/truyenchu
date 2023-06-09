@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh Sách Thể Loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            <th scope="col">Slug thể loại</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($theloai as $key => $the )
                          <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $the -> tentheloai }}</td>
                            <td>{{ $the -> slug_theloai }}</td>
                            <td>{{ $the -> mota }}</td>
                            <td>
                                @if ($the -> kichhoat == 0)
                                <span class="text text-danger"> Chưa kích hoạt</span>
                                @else
                                <span class="text text-success"> Kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('theloai.edit',[$the->id]) }}" class="btn btn-primary mb-1">Edit</a>
                                <form action="{{ route('theloai.destroy',[$the->id]) }}" method="POST" >
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Bạn có muốn xóa thể loại này không ?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                          </tr>
                        @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
