@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="text-center mb-4">THÊM</h2>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Tên sản phẩm</label>
            <input type="text" name="ten_san_pham" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tên khoa học</label>
            <input type="text" name="ten_khoa_hoc" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tên thông thường</label>
            <input type="text" name="ten_thong_thuong" class="form-control">
        </div>

        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="mo_ta" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Độ khó</label>
            <input type="text" name="do_kho" class="form-control">
        </div>

        <div class="mb-3">
            <label>Yêu cầu ánh sáng</label>
            <input type="text" name="anh_sang" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nhu cầu nước</label>
            <input type="text" name="nuoc" class="form-control">
        </div>

        <div class="mb-3">
            <label>Giá bán</label>
            <input type="text" name="gia" class="form-control">
        </div>

        <div class="mb-3">
            <label>Ảnh</label>
            <input type="file" name="hinh_anh" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>

    </form>

</div>
@endsection