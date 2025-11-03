<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!--
      Chúng ta dùng chung file CSS/JS với trang public
      Vì cả 2 đều dùng Bootstrap 5
    -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #f8f9fa;">

    <!-- Navbar Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                THPT Nguyễn Thị Minh Khai - Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav"
                aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" target="_blank">Xem Website</a>
                    </li>
                    <li class="nav-item">
                        <!-- Form Đăng xuất -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <!--
                      Chúng ta dùng class 'btn btn-link nav-link'
                      để nút Submit trông giống một link
                    -->
                            <button type="submit" class="btn btn-link nav-link" style="padding: 0.5rem;">
                                Đăng xuất ({{ Auth::user()->name }})
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- (Sau này chúng ta sẽ thêm Sidebar ở đây) -->

    <!-- Nội dung chính -->
    <main class="container my-4">
        @yield('content')
    </main>

</body>

</html>
