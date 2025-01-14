<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý</title>
    <!-- Sử dụng Bootstrap 5 từ CDN -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Link đến trang danh sách vấn đề -->
            <a class="navbar-brand" href="{{ route('products.index') }}">Quản Lý</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Liên kết đến danh sách vấn đề -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('products.index') }}">Danh sách</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung của từng trang con sẽ được hiển thị ở đây -->
    <div class="container mt-4">
        @yield('content') <!-- Phần nội dung thay đổi ở các trang con -->
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
</body>

</html>
