@extends('layouts.app')

@section('title', 'Liên Hệ - Cửa hàng thể thao')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Thông Tin Liên Hệ</h2>
            
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Cửa hàng thể thao</h5>
                    <p class="card-text"><i class="fas fa-map-marker-alt me-2 text-success"></i> 123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh</p>
                    <p class="card-text"><i class="fas fa-phone me-2 text-success"></i> <a href="tel:012345678" class="text-decoration-none">012345678</a></p>
                    <p class="card-text"><i class="fas fa-envelope me-2 text-success"></i> <a href="mailto:info@cuahangthethao.org" class="text-decoration-none">info@cuahangthethao.org</a></p>
                    <p class="card-text"><i class="fas fa-clock me-2 text-success"></i> Thứ Hai - Thứ Bảy: 8:00 - 18:00</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hướng Dẫn Mua Hàng</h5>
                    <p class="card-text">Để đặt mua sản phẩm, quý khách vui lòng liên hệ với chúng tôi qua số điện thoại, Zalo hoặc Facebook.</p>
                    <p class="card-text">Chúng tôi sẽ liên hệ lại với quý khách trong thời gian sớm nhất để xác nhận đơn hàng và thông tin giao hàng.</p>
                    <p class="card-text">Thanh toán có thể thực hiện qua chuyển khoản ngân hàng hoặc thanh toán khi nhận hàng (COD).</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

