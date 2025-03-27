<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cửa hàng thể thao')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <header>
        <!-- Top Bar -->
        <div class="bg-success text-white py-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="social-icons">
                            <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Header -->
        <div class="container py-3">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <img loading="lazy" src="{{ asset('images/logo.png') }}" alt="Cửa hàng thể thao" class="img-fluid" style="max-height: 60px;">
                    </a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('products.index') }}" method="GET" class="search-form">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Nhập từ khóa" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 text-end">
                    <div class="contact-info">
                        <p class="mb-0 small">Gọi ngay</p>
                        <a href="tel:0xxxxxxxx" class="text-success text-decoration-none fw-bold">0xxxxxxxx</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav me-auto">
                        {{-- <li class="nav-item dropdown"> --}}
                        {{--     <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> --}}
                        {{--         <i class="fas fa-bars me-2"></i> DANH MỤC --}}
                        {{--     </a> --}}
                        {{--     <ul class="dropdown-menu"> --}}
                        {{--         @foreach($categories as $category) --}}
                        {{--         <li> --}}
                        {{--             <a class="dropdown-item" href="{{ route('products.category', $category->slug) }}"> --}}
                        {{--                 {{ $category->name }} --}}
                        {{--             </a> --}}
                        {{--         </li> --}}
                        {{--         @endforeach --}}
                        {{--     </ul> --}}
                        {{-- </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">SẢN PHẨM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="bg-success text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Về Chúng Tôi</h5>
                    <p>Cửa hàng thể thao Sport Elite cung cấp các sản phẩm thể thao chất lượng cao, thiết bị tập luyện và trang phục thể thao chuyên nghiệp tại Việt Nam.</p>
                    <p>Địa chỉ: 123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh</p>
                    <p>Email: info@cuahangthethao.org</p>
                    <p>Điện thoại: 0xxxxxxxx</p>
                </div>
                {{-- <div class="col-md-4">
                    <h5>Danh Mục Sản Phẩm</h5>
                    <ul class="list-unstyled">
                        @foreach($categories as $category)
                        <li><a href="{{ route('products.category', $category->slug) }}" class="text-white">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div> --}}
                <div class="col-md-4">
                    <h5>Kết Nối Với Chúng Tôi</h5>
                    <div class="social-icons">
                        <a href="#" target="_blank" class="text-white me-3"><i class="fab fa-facebook-f fa-1x"></i></a>
                        <a href="#" target="_blank" class="text-white me-3">
                            <img src="{{ asset('images/zalo-icon.svg') }}" alt="Zalo" class="zalo-icon">
                        </a>
					</a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} Cửa hàng thể thao. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('scripts')
</body>
</html>

