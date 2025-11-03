@extends('layouts.app')
@section('title', 'Tin tức & Sự kiện')
@section('content')
    <div class="container my-5">
        <h1 class="text-center fw-bold mb-4">Tin tức & Sự kiện</h1>
        <div class="row g-4">
            @forelse ($posts as $post)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img src="{{ $post->picture ?? '[https://placehold.co/600x400/cccccc/white?text=Ảnh+bài+viết](https://placehold.co/600x400/cccccc/white?text=Ảnh+bài+viết)' }}"
                                class="card-img-top" alt="{{ $post->title }}">
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
        <!-- Phân trang -->
        <div class="mt-5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
