@extends('layouts.app')

@section('title', 'Cửa hàng thể thao - Trang Chủ')

@section('content')
<div class="container">
    <!-- Hero Banner -->
    <div class="row">
        <div class="col-md-3">
            <div class="list-group mb-4">
                <div class="list-group-item bg-success text-white">
                    <strong>DANH MỤC SẢN PHẨM</strong>
                </div>
                {{-- @foreach($categories as $category) --}}
                {{-- <a href="{{ route('products.category', $category->slug) }}" class="list-group-item list-group-item-action"> --}}
                    {{-- {{ $category->name }} --}}
                {{-- </a> --}}
                {{-- @endforeach --}}
            </div>
        </div>
        <div class="col-md-9">
            <div id="mainCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                   <div class="carousel-item active">
                        {{-- <img loading="lazy" src="{{ asset('images/banner1.jpg') }}" class="d-block w-100" alt="Banner 1"> --}}
                        <img loading="lazy" src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Banner 1">
                    </div>
                    <div class="carousel-item">
                        <img loading="lazy" src="https://plus.unsplash.com/premium_photo-1664537975122-9c598d85816e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Banner 2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Latest Products -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="section-title text-center mb-4">
                <h2 class="text-success">SẢN PHẨM MỚI NHẤT</h2>
                <hr class="divider mx-auto">
            </div>
        </div>
    </div>
    
    <div class="row">
        @foreach($latestProducts as $product)
        <div class="col-md-3 mb-4">
            <div class="card product-card h-100">
                <a href="{{ route('products.show', $product->slug) }}">
                    <img loading="lazy" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark">
                            {{ $product->name }}
                        </a>
                    </h5>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fs-5 fw-bold text-danger">{{ $product->formatted_price }}</span>
                                @if($product->original_price)
                                <span class="text-decoration-line-through text-muted ms-2">{{ $product->formatted_original_price }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ route('contact') }}" class="btn btn-success">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mb-5">
        <a href="{{ route('products.index') }}" class="btn btn-outline-success">Xem tất cả sản phẩm</a>
    </div>

    <!-- Featured Products -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="section-title text-center mb-4">
                <h2 class="text-success">SẢN PHẨM NỔI BẬT</h2>
                <hr class="divider mx-auto">
            </div>
        </div>
    </div>
    
    <div class="row">
        @foreach($featuredProducts as $product)
        <div class="col-md-3 mb-4">
            <div class="card product-card h-100">
                <a href="{{ route('products.show', $product->slug) }}">
                    <img loading="lazy" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark">
                            {{ $product->name }}
                        </a>
                    </h5>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fs-5 fw-bold text-danger">{{ $product->formatted_price }}</span>
                                @if($product->original_price)
                                <span class="text-decoration-line-through text-muted ms-2">{{ $product->formatted_original_price }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ route('contact') }}" class="btn btn-success">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

