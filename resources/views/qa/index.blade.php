@extends('layouts.app')
@section('title', 'Tư vấn & Hỏi đáp')
@section('content')
    <div class="container my-5">
        <div class="row g-5">
            <!-- Cột 1: Form Đặt câu hỏi -->
            <div class="col-lg-5">
                <h2 class="fw-bold mb-4">Đặt câu hỏi mới</h2>
                <p class="text-muted mb-4">Có thắc mắc về tuyển sinh? Hãy gửi câu hỏi cho chúng tôi.</p>
                @if (session('success'))
                    <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
                @endif
                @if ($errors->any() && !session('success'))
                    <div class="alert alert-danger" role="alert"> Vui lòng kiểm tra lại thông tin! </div>
                @endif
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <form action="{{ route('qa.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên (*)</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email (*)</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="question_content" class="form-label">Nội dung câu hỏi (*)</label>
                                <textarea class="form-control @error('question_content') is-invalid @enderror" id="question_content"
                                    name="question_content" rows="5" required>{{ old('question_content') }}</textarea>
                                @error('question_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-lg">Gửi câu hỏi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Cột 2: Danh sách FAQ -->
            <div class="col-lg-7">
                <h2 class="fw-bold mb-4">Các câu hỏi thường gặp (FAQ)</h2>
                <div class="accordion" id="faqAccordion">
                    @forelse ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $faq->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $faq->id }}" aria-expanded="false"
                                    aria-controls="collapse-{{ $faq->id }}">
                                    {{ $faq->question_content }}
                                </button>
                            </h2>
                            <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{ $faq->id }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <strong>Trả lời:</strong> {!! nl2br(e($faq->answer_content)) !!}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info">Hiện chưa có câu hỏi thường gặp nào.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
