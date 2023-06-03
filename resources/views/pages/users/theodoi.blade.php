@extends('../layout')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Truyện theo dõi</li>
    </ol>
  </nav>

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

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên truyện</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Quản lý</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($theodoi as $key => $doi)
          <tr>
            <th scope="row">{{ $key }}</th>
            <td>{{ $doi->title }}</td>
            <td><img class="card-img-top" width="80" height="180" src="{{ asset('uploads/truyen/'.$doi->image) }}" alt=""></td>
            <td>{{ $doi->publisher->username }}</td>
            <td><a onclick="return confirm('Bạn có muốn dừng theo dõi truyện này không ?');" href="{{ route('xoatheodoi',[$doi->id]) }}" class="btn btn-danger btn-small">Xóa</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>



@endsection
