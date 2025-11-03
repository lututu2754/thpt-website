@extends('layouts.app')
@section('title', 'Liên hệ - Trường THPT Nguyễn Thị Minh Khai')
@section('content')
    <div class="container my-5">
        <div class="row">
            <!-- Cột 1: Thông tin liên hệ -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">Thông tin liên hệ</h2>
                <p class="text-muted mb-4">Quý Phụ huynh và học sinh có thắc mắc vui lòng liên hệ trực tiếp với nhà trường.
                </p>
                <div class="d-flex align-items-start mb-3">
                    <div class="ms-3">
                        <h5 class="fw-bold">Địa chỉ</h5>
                        <!-- CẬP NHẬT ĐỊA CHỈ -->
                        <p class="text-muted">2C73+XFJ, QL57, Hương Mỹ, Mỏ Cày Nam, Bến Tre, Vietnam</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <div class="ms-3">
                        <h5 class="fw-bold">Điện thoại</h5>
                        <p class="text-muted">(028) 1234 5678</p> <!-- (Bạn tự sửa SĐT thật nhé) -->
                    </div>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <div class="ms-3">
                        <h5 class="fw-bold">Email</h5>
                        <p class="text-muted">info@thptminhkhai.edu.vn</p> <!-- (Bạn tự sửa email thật nhé) -->
                    </div>
                </div>

                <!-- Bản đồ Google Maps -->
                <div class="mt-4">
                    <h5 class="fw-bold mb-3">Bản đồ</h5>
                    <!--
                          CẬP NHẬT IFRAME
                        -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3734.618047632242!2d106.40108047479379!3d10.01497329009118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a01b2ee28c4487%3A0xa48cae3e373f897c!2sNguy%E1%BB%85n%20Th%E1%BB%8B%20Minh%20Khai%20High%20School!5e1!3m2!1sen!2s!4v1762155069061!5m2!1sen!2s"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="rounded shadow-sm">
                    </iframe>
                </div>

            </div>
            <!-- Cột 2: Form liên hệ -->
            <div class="col-lg-7">
                <h2 class="fw-bold mb-4">Gửi phản hồi cho chúng tôi</h2>
                @if (session('success'))
                    <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
                @endif
                @if ($errors->any() && !session('success'))
                    <div class="alert alert-danger" role="alert"> Vui lòng kiểm tra lại thông tin đã nhập! </div>
                @endif
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <form action="{{ route('contact.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên (*)</label>
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
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Nội dung liên hệ (*)</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5"
                                    required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-lg">Gửi liên hệ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
