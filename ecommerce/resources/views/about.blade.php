@extends('layouts.app')

@section('title', 'Giới thiệu - Cửa hàng thể thao')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giới thiệu về Cửa hàng thể thao</li>
        </ol>
    </nav>

    <h1 class="mb-4">Giới thiệu về Cửa hàng thể thao</h1>

    <div class="row">
        <div class="col-lg-8">
            <p>Cửa hàng thể thao Sport Elite cung cấp các sản phẩm thể thao chất lượng cao, thiết bị tập luyện và trang phục thể thao chuyên nghiệp tại Việt Nam</p>

            <h2 class="mt-4 mb-3">Sứ mệnh</h2>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Mang đến các sản phẩm thể thao chất lượng cao từ các thương hiệu uy tín trên thế giới</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Cung cấp trang phục và thiết bị thể thao phù hợp với mọi môn thể thao và mọi cấp độ từ người mới bắt đầu đến vận động viên chuyên nghiệp</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Hỗ trợ khách hàng xây dựng lối sống năng động, khỏe mạnh thông qua các sản phẩm thể thao và tư vấn chuyên nghiệp</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Không ngừng cập nhật các xu hướng thể thao mới nhất và đa dạng hóa sản phẩm để đáp ứng nhu cầu ngày càng cao của khách hàng</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Trở thành điểm đến tin cậy hàng đầu cho những người yêu thích thể thao và lối sống năng động tại Việt Nam</li>
            </ul>
            <div class="text-center my-5">
                <img loading="lazy" src="{{ asset('images/logo.png') }}" alt="Lali Shop Logo" class="img-fluid" style="max-width: 300px;">
            </div>

            <h2 class="mt-4 mb-3">Cam kết</h2>
            <p>Cửa hàng thể thao cam kết:</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Cung cấp chính sách chăm sóc khách hàng chu đáo, tận tình, chuyên nghiệp.</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Hoàn tiền nếu sản phẩm không đảm bảo chất lượng như cam kết ban đầu.</li>
            </ul>

            <div class="alert alert-success mt-4" role="alert">
                <strong>Cửa hàng thể thao sự lựa chọn phù hợp cho khách hàng!</strong>
            </div>
        </div>
    </div>
</div>
@endsection