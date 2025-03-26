@extends('layouts.app')

@section('title', $category->name . ' - Làm Đẹp Thiên Nhiên')

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group mb-4">
                <div class="list-group-item bg-success text-white">
                    <strong>DANH MỤC SẢN PHẨM</strong>
                </div>
                @foreach($categories as $cat)
                <a href="{{ route('products.category', $cat->slug) }}" 
                   class="list-group-item list-group-item-action {{ $cat->id == $category->id ? 'active' : '' }}">
                    {{ $cat->name }}
                </a>
                @endforeach
            </div>
        </div>

        <!-- Products List -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>{{ $category->name }}</h2>
                <div class="sort-options">
                    <select class="form-select" onchange="window.location.href = this.value">
                        <option value="{{ route('products.category', ['slug' => $category->slug, 'sort' => 'latest']) }}" {{ request('sort') == 'latest' ? 'selected' : '' }}>
                            Mới nhất
                        </option>
                        <option value="{{ route('products.category', ['slug' => $category->slug, 'sort' => 'price-low-high']) }}" {{ request('sort') == 'price-low-high' ? 'selected' : '' }}>
                            Giá: Thấp đến Cao
                        </option>
                        <option value="{{ route('products.category', ['slug' => $category->slug, 'sort' => 'price-high-low']) }}" {{ request('sort') == 'price-high-low' ? 'selected' : '' }}>
                            Giá: Cao đến Thấp
                        </option>
                    </select>
                </div>
            </div>

            @if($category->description)
            <div class="category-description mb-4">
                <p>{{ $category->description }}</p>
            </div>
            @endif

            @if($products->isEmpty())
            <div class="alert alert-warning">
                Không có sản phẩm nào trong danh mục này.
            </div>
            @else
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card product-card h-100">
                        <a href="{{ route('products.show', $product->slug) }}">
                           <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
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
                                    <a href="{{ route('products.show', $product->slug) }}" class="btn btn-success">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $products->appends(request()->except('page'))->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

