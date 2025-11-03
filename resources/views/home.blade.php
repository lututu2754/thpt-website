@extends('layouts.app')
@section('title', 'Trang chủ - Trường THPT Hòa Bình')
@section('content')
    <!-- 1. Hero -->
    <div class="bg-primary text-white text-center p-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Chào mừng đến với THPT Hòa Bình</h1>
            <p class="lead">Nơi ươm mầm tài năng và chắp cánh tương lai</p>
            <a href="{{ route('admissions.create') }}" class="btn btn-light btn-lg">Đăng ký tuyển sinh ngay</a>
        </div>
    </div>
    <!-- 2. Giới thiệu ngắn -->
    <div class="container mt-5">
        <div class="row align-items-center g-4 mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold">Về Nhà trường</h2>
                <p class="text-muted">Trường THPT Hòa Bình tự hào với lịch sử hơn 20 năm xây dựng và phát triển, cung cấp môi
                    trường giáo dục toàn diện, hiện đại...</p>
                <a href="{{ route('page.show', ['slug' => 'lich-su-phat-trien']) }}" class="btn btn-outline-primary">Xem
                    thêm về Lịch sử</a>
            </div>
            <div class="col-lg-6">
                <!--
                      THAY ĐỔI:
                      1. Thêm class 'w-100' (width 100%)
                      2. Thêm style 'height: 350px' (hoặc 400px tùy bạn)
                      3. Thêm style 'object-fit: cover' (để ảnh tự crop, không bị méo)
                    -->
                <img src="{{ asset('images/anh-truong.jpg') }}"
                    onerror="this.src='https://placehold.co/600x400/3498db/white?text=Ảnh+Trường+THPT+Hòa Bình'"
                    class="img-fluid rounded shadow-sm w-100" style="height: 350px; object-fit: cover;"
                    alt="Ảnh trường THPT Hòa Bình">
            </div>
        </div>
        <hr class="my-4">
        <!-- 3. Tin tức nổi bật -->
        <div class="container mb-5">
            <h2 class="text-center fw-bold mb-4">Tin tức & Sự kiện nổi bật</h2>
            <div class="row g-4">
                @forelse ($featured_posts as $post)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                <!--
                                      THAY ĐỔI: Thêm style cho ảnh tin tức
                                      để đảm bảo chúng cao bằng nhau
                                    -->
                                <img src="{{ $post->picture ?? 'https://placehold.co/600x400/cccccc/white?text=Ảnh+bài+viết' }}"
                                    class="card-img-top" style="height: 200px; object-fit: cover;"
                                    alt="{{ $post->title }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <a href="{{ route('posts.show', $post->slug) }}"
                                        class="text-decoration-none text-dark">{{ $post->title }}</a>
                                </h5>
                                <div class="text-muted small">
                                    Ngày đăng: {{ $post->created_at->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary btn-sm">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Hiện chưa có tin tức nào.</p>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-lg">Xem tất cả tin tức</a>
            </div>
        </div>
    </div>
@endsection
