<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Trường THPT Hòa Bình')</title>
    <meta name="description" content="@yield('description', 'Website chính thức của Trường THPT Hòa Bình')">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app-wrapper" class="d-flex flex-column min-vh-100">
        <header>
            @include('layouts.partials.navbar')
        </header>
        <main class="flex-shrink-0">
            @yield('content')
        </main>
        <footer class="mt-auto">
            @include('layouts.partials.footer')
        </footer>
    </div>
    <a href="#" class="btn btn-light" id="btn-back-to-top" title="Lên đầu trang">
        <svg xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" width="1em" height="1em"
            fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16"
            style="font-size: 1.8rem; color: var(--bs-primary);">
            <path fill-rule="evenodd"
                d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5" />
        </svg>
    </a>
</body>

</html>
