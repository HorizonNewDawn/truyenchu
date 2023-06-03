@extends('../layout')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
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

  <form class="mb-3" method="POST" action="{{ route('register-publisher') }}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
        <input type="text" name="username" class="form-control" placeholder="Tên tài khoản..." id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Địa chỉ email</label>
      <input type="email" name="email" class="form-control" placeholder="Địa chỉ email..." id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
      <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Xác nhận mật khẩu</label>
        <input type="password" name="password_confirm" class="form-control" placeholder="Mật khẩu..." id="exampleInputPassword1">
      </div>
    {{-- <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-primary">Đăng ký</button>
  </form>



@endsection
