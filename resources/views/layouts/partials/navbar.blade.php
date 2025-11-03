<nav class="navbar navbar-expand-lg bg-primary shadow-sm" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">THPT Hòa Bình</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Trang chủ</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->routeIs('page.show') ? 'active' : '' }}" href="#" id="navbarDropdownIntro" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Giới thiệu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownIntro">
            <li><a class="dropdown-item" href="{{ route('page.show', ['slug' => 'lich-su-phat-trien']) }}">Lịch sử phát triển</a></li>
            <li><a class="dropdown-item" href="{{ route('page.show', ['slug' => 'co-so-vat-chat']) }}">Cơ sở vật chất</a></li>
            <li><a class="dropdown-item" href="{{ route('page.show', ['slug' => 'doi-ngu-giao-vien']) }}">Đội ngũ giáo viên</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('posts.index') || request()->routeIs('posts.show') ? 'active' : '' }}" href="{{ route('posts.index') }}">Tin tức & Sự kiện</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('qa.index') ? 'active' : '' }}" href="{{ route('qa.index') }}">Tư vấn (Q&A)</a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contact.create') ? 'active' : '' }}" href="{{ route('contact.create') }}">Liên hệ</a>
        </li>
        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
          <a class="btn btn-light btn-sm" href="{{ route('admissions.create') }}">Đăng ký Tuyển sinh</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
