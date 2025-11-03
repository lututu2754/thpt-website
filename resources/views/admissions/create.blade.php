@extends('layouts.app')
@section('title', 'Đăng ký Tuyển sinh Trực tuyến')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h2 class="text-center mb-4 fw-bold">Phiếu đăng ký tuyển sinh trực tuyến</h2>
                <p class="text-center text-muted mb-4">Vui lòng điền đầy đủ và chính xác thông tin dưới đây.</p>
                @if (session('success'))
                    <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
                @endif
                @if ($errors->any() && !session('success'))
                    <div class="alert alert-danger" role="alert"> Vui lòng kiểm tra lại các thông tin! </div>
                @endif
                <form action="{{ route('admissions.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-primary text-white" data-bs-theme="dark">
                            <h5 class="mb-0">1. Thông tin học sinh</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <label for="student_name" class="form-label">Họ và tên học sinh (*)</label>
                                <input type="text" class="form-control @error('student_name') is-invalid @enderror"
                                    id="student_name" name="student_name" value="{{ old('student_name') }}" required>
                                @error('student_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="student_dob" class="form-label">Ngày sinh (*)</label>
                                <input type="text"
                                    class="form-control datepicker @error('student_dob') is-invalid @enderror"
                                    id="student_dob" name="student_dob" value="{{ old('student_dob') }}" required
                                    placeholder="dd/mm/yyyy">
                                @error('student_dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ cư trú (*)</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2"
                                    required>{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white" data-bs-theme="dark">
                            <h5 class="mb-0">2. Thông tin Phụ huynh</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <label for="parent_name" class="form-label">Họ tên phụ huynh (*)</label>
                                <input type="text" class="form-control @error('parent_name') is-invalid @enderror"
                                    id="parent_name" name="parent_name" value="{{ old('parent_name') }}" required>
                                @error('parent_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="parent_phone" class="form-label">Số điện thoại liên hệ (*)</label>
                                <input type="tel" class="form-control @error('parent_phone') is-invalid @enderror"
                                    id="parent_phone" name="parent_phone" value="{{ old('parent_phone') }}" required>
                                @error('parent_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Gửi Đăng Ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
