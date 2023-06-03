{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 errors</title>
</head>
<body>
    <img src="https://drudesk.com/sites/default/files/styles/blog_page_header_1088x520/public/2018-02/404-error-page-not-found.jpg?itok=YW-iShwf" alt="" width="854" height="480"><br>
    <a>Trang không tồn tại, vui lòng trở về <a href="{{ url('/') }}">trang chủ</a></a>
</body>
</html>

