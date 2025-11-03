<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // <-- Import User model
use Illuminate\Support\Facades\Hash; // <-- Import Hash

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo tài khoản Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com', // Email đăng nhập
            'password' => Hash::make('password'), // Mật khẩu là 'password'
            'role' => 'admin', // Phân quyền admin
        ]);
    }
}
