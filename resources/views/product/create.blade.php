@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Thêm sản phẩm mới</h1>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="ten_san_pham" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
            <input type="text" name="ten_san_pham" id="ten_san_pham" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="ten_khoa_hoc" class="block text-sm font-medium text-gray-700">Tên khoa học</label>
            <input type="text" name="ten_khoa_hoc" id="ten_khoa_hoc" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="ten_thong_thuong" class="block text-sm font-medium text-gray-700">Tên thông thường</label>
            <input type="text" name="ten_thong_thuong" id="ten_thong_thuong" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="mo_ta" class="block text-sm font-medium text-gray-700">Mô tả</label>
            <textarea name="mo_ta" id="mo_ta" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>

        <div class="mb-4">
            <label for="do_kho" class="block text-sm font-medium text-gray-700">Độ khó</label>
            <input type="text" name="do_kho" id="do_kho" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="anh_sang" class="block text-sm font-medium text-gray-700">Ánh sáng</label>
            <input type="text" name="anh_sang" id="anh_sang" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="nuoc" class="block text-sm font-medium text-gray-700">Nước</label>
            <input type="text" name="nuoc" id="nuoc" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="gia" class="block text-sm font-medium text-gray-700">Giá</label>
            <input type="number" name="gia" id="gia" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="hinh_anh" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
            <input type="file" name="hinh_anh" id="hinh_anh" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Thêm sản phẩm</button>
    </form>
</div>
@endsection