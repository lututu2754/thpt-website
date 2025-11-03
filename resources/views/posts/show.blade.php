@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <!-- Tiêu đề -->
                <h1 class="fw-bold mb-3">{{ $post->title }}</h1>
                <!-- Thông tin meta -->
                <div class="text-muted mb-4">
                    Đăng ngày: {{ $post->created_at->format('d/m/Y') }}
                    <!-- (Bạn có thể thêm Tác giả nếu muốn) -->
                </div>
                <!-- Ảnh đại diện -->
                @if ($post->picture)
                    <img src="{{ $post->picture }}" class="img-fluid rounded shadow-sm mb-4 w-100" alt="{{ $post->title }}">
                @endif
                <!-- Nội dung -->
                <div class="fs-5">
                    {!! nl2br(e($post->content)) !!} <!-- Hiển thị nội dung, e() để bảo mật, nl2br() để giữ xuống dòng -->
                </div>
            </div>
        </div>
    </div>
@endsection
