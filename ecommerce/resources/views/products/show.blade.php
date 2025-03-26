@extends('layouts.app')

@section('title', $product->name . ' - Làm Đẹp Thiên Nhiên')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-5">
            <div class="product-image mb-4">
               <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            </div>
        </div>
        <div class="col-md-7">
            <h1 class="mb-3">{{ $product->name }}</h1>
            
            <div class="product-price mb-4">
                <span class="fs-3 fw-bold text-danger">{{ $product->formatted_price }}</span>
                @if($product->original_price)
                <span class="text-decoration-line-through text-muted ms-3">{{ $product->formatted_original_price }}</span>
                <span class="badge bg-danger ms-2">-{{ $product->discount_percent }}%</span>
                @endif
            </div>
            
            <div class="product-description mb-4">
                <h5>Mô Tả Sản Phẩm</h5>
                <p>{{ $product->description }}</p>
            </div>
            
            @if($product->details)
            <div class="product-details mb-4">
                <h5>Chi Tiết Sản Phẩm</h5>
                <div>
                    {!! $product->details !!}
                </div>
            </div>
            @endif
            
            <div class="product-meta mb-4">
                <p><strong>Danh mục:</strong> <a href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a></p>
                <p><strong>Tình trạng:</strong> @if($product->stock > 0) <span class="text-success">Còn hàng</span> @else <span class="text-danger">Hết hàng</span> @endif</p>
                @if($product->sku)
                <p><strong>Mã sản phẩm:</strong> {{ $product->sku }}</p>
                @endif
            </div>
            
            <div class="product-actions">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="decrease">-</button>
                            <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="{{ $product->stock }}">
                            <button class="btn btn-outline-secondary" type="button" id="increase">+</button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="d-grid gap-2">
                            <button class="btn btn-success" type="button" id="addToCart">Thêm vào giỏ hàng</button>
                            <button class="btn btn-danger" type="button" id="buyNow">Mua ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="related-products mt-5">
        <h3 class="mb-4">Sản Phẩm Liên Quan</h3>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <a href="{{ route('products.show', $relatedProduct->slug) }}">
                    <img src="{{ Storage::url($relatedProduct->image) }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            <a href="{{ route('products.show', $relatedProduct->slug) }}" class="text-decoration-none text-dark">
                                {{ $relatedProduct->name }}
                            </a>
                        </h5>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fs-5 fw-bold text-danger">{{ $relatedProduct->formatted_price }}</span>
                                    @if($relatedProduct->original_price)
                                    <span class="text-decoration-line-through text-muted ms-2">{{ $relatedProduct->formatted_original_price }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <a href="{{ route('products.show', $relatedProduct->slug) }}" class="btn btn-success">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quantity input handlers
        const quantityInput = document.getElementById('quantity');
        const decreaseBtn = document.getElementById('decrease');
        const increaseBtn = document.getElementById('increase');
        
        decreaseBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });
        
        increaseBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            const maxValue = parseInt(quantityInput.getAttribute('max'));
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
        });
        
        // Add to cart button
        const addToCartBtn = document.getElementById('addToCart');
        addToCartBtn.addEventListener('click', function() {
            // In a real application, this would add the product to a cart
            alert('Sản phẩm đã được thêm vào giỏ hàng');
        });
        
        // Buy now button
        const buyNowBtn = document.getElementById('buyNow');
        buyNowBtn.addEventListener('click', function() {
            // In a real application, this would redirect to checkout
            alert('Chuyển đến trang thanh toán');
        });
    });
</script>
@endsection

