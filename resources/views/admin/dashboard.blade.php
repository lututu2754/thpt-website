@extends('layouts.admin')

@section('title', 'Bảng điều khiển Admin')

@section('content')
    <h1 class="fw-bold">Chào mừng, {{ Auth::user()->name }}!</h1>
    <p class="lead">Đây là trang quản trị của bạn.</p>
    <p>Từ đây, bạn có thể bắt đầu quản lý các mục như:</p>
    <ul>
        <li>Quản lý Tin tức (Chúng ta sẽ làm ở bước tiếp theo)</li>
        <li>Xem các đơn Đăng ký Tuyển sinh</li>
        <li>Xem và trả lời Liên hệ & Hỏi đáp</li>
    </ul>
@endsection

