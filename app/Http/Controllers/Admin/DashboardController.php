<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Hiển thị trang dashboard chính
     */
    public function index()
    {
        // Trỏ đến view chúng ta sắp tạo
        return view('admin.dashboard');
    }
}
