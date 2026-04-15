<x-cay-canh-layout>
    <x-slot name="title">Thêm sản phẩm</x-slot>

    <h3 class="text-center text-primary fw-bold my-3">THÊM</h3>

    <form method="POST" action="{{ url('admin/sanpham/them') }}" enctype="multipart/form-data"
      style="max-width:500px; margin:0 auto;">
    @csrf
    
    <div class="form-group">
        <label>Tên sản phẩm</label>
        <input type="text" name="ten_san_pham"
               class="form-control @error('ten_san_pham') is-invalid @enderror"
               value="{{ old('ten_san_pham') }}">
        @error('ten_san_pham')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Tên khoa học</label>
        <input type="text" name="ten_khoa_hoc"
               class="form-control @error('ten_khoa_hoc') is-invalid @enderror"
               value="{{ old('ten_khoa_hoc') }}">
        @error('ten_khoa_hoc')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Tên thông thường</label>
        <input type="text" name="ten_thong_thuong"
               class="form-control @error('ten_thong_thuong') is-invalid @enderror"
               value="{{ old('ten_thong_thuong') }}">
        @error('ten_thong_thuong')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Mô tả</label>
        <textarea name="mo_ta" class="form-control" rows="3">{{ old('mo_ta') }}</textarea>
    </div>

    <div class="form-group">
        <label>Độ khó</label>
        <input type="text" name="do_kho"
               class="form-control @error('do_kho') is-invalid @enderror"
               value="{{ old('do_kho') }}">
        @error('do_kho')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Yêu cầu ánh sáng</label>
        <input type="text" name="yeu_cau_anh_sang"
               class="form-control @error('yeu_cau_anh_sang') is-invalid @enderror"
               value="{{ old('yeu_cau_anh_sang') }}">
        @error('yeu_cau_anh_sang')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Nhu cầu nước</label>
        <input type="text" name="nhu_cau_nuoc"
               class="form-control @error('nhu_cau_nuoc') is-invalid @enderror"
               value="{{ old('nhu_cau_nuoc') }}">
        @error('nhu_cau_nuoc')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Giá bán</label>
        <input type="number" name="gia_ban"
               class="form-control @error('gia_ban') is-invalid @enderror"
               value="{{ old('gia_ban') }}">
        @error('gia_ban')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Ảnh</label>
        <input type="file" name="hinh_anh"
               class="form-control-file border p-1 w-100 @error('hinh_anh') is-invalid @enderror">
        @error('hinh_anh')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
</x-cay-canh-layout>