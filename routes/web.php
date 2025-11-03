<?php

use Illuminate\Support\Facades\Route;

// --- 1. IMPORT CÁC CONTROLLER PUBLIC ---
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PostController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\AdmissionController;
use App\Http\Controllers\Public\QuestionController;
use App\Http\Controllers\Public\ContactController;

// --- 2. IMPORT CÁC CONTROLLER ADMIN ---
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController; // (Chúng ta sẽ tạo ở bước sau)

/*
|--------------------------------------------------------------------------
| PHẦN PUBLIC (Giữ nguyên)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gioi-thieu/{slug}', [PageController::class, 'show'])->name('page.show');
Route::get('/tin-tuc', [PostController::class, 'index'])->name('posts.index');
Route::get('/tin-tuc/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/dang-ky-tuyen-sinh', [AdmissionController::class, 'create'])->name('admissions.create');
Route::post('/dang-ky-tuyen-sinh', [AdmissionController::class, 'store'])->name('admissions.store');
Route::get('/tu-van-hoi-dap', [QuestionController::class, 'index'])->name('qa.index');
Route::post('/tu-van-hoi-dap', [QuestionController::class, 'store'])->name('qa.store');
Route::get('/lien-he', [ContactController::class, 'create'])->name('contact.create');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| PHẦN ADMIN (MỚI)
|--------------------------------------------------------------------------
*/

// 1. Route Đăng nhập (Dành cho khách)
// Dùng 'name('login')' để middleware 'auth' tự động chuyển hướng về đây
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');

// 2. Nhóm Route Admin (Đã được bảo vệ)
// Yêu cầu: Phải đăng nhập (middleware 'auth')
// Đường dẫn: /admin/... (prefix 'admin')
// Tên route: admin.... (name 'admin.')
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Trang Dashboard
    // Route này sẽ là /admin/dashboard và tên là 'admin.dashboard'
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
    
    // Nút Đăng xuất
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // (Sau này chúng ta sẽ thêm các route CRUD (Quản lý Tin tức...) vào đây)
    
});

