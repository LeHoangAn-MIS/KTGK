<x-cay-canh-layout>
    <x-slot name="title">
        {{ $product->ten_san_pham }}
    </x-slot>

    <div class="container mt-5">
        <div class="row shadow-sm p-4 border rounded bg-white align-items-start">
            
            <div class="col-md-4 text-center">
                <div class="product-image-container">
                    <img src="{{ asset('image/' . $product->hinh_anh) }}" 
                         class="img-fluid rounded shadow-sm w-100" 
                         style="max-height: 450px; object-fit: contain;"
                         alt="{{ $product->ten_san_pham }}">
                </div>
            </div>

            <div class="col-md-8 ps-md-4">
                <h2 class="fw-bold mb-3" style="color: #333;">{{ $product->ten_san_pham }}</h2>
                
                <div class="product-details" style="font-size: 1rem; line-height: 1.8; color: #444;"> 
                    <p class="mb-1">Tên khoa học: {{ $product->ten_khoa_hoc }}</p>
                    <p class="mb-1">Tên thông thường: {{ $product->ten_thong_thuong }}</p>
                    <p class="mb-1 text-justify">Mô tả: {{ $product->mo_ta }}</p>
                    <p class="mb-1">Quy cách sản phẩm: {{ $product->quy_cach_san_pham }}</p>
                    <p class="mb-1">Độ khó: {{ $product->do_kho }}</p>
                    <p class="mb-1">Yêu cầu ánh sáng: {{ $product->yeu_cau_anh_sang }}</p>
                    <p class="mb-1">Nhu cầu nước: {{ $product->nhu_cau_nuoc }}</p>
                    <p class="fs-4 mt-3">
                        <strong>Giá:</strong> 
                        <span class="text-danger fw-bold" style="font-style: italic;">
                            {{ number_format($product->gia_ban, 0, ',', '.') }} VNĐ
                        </span> 
                    </p>
                </div>

                <form action="{{ route('cart.add') }}" method="POST" class="mt-4 p-3 bg-light rounded border d-inline-block">
                 @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
    
                    <div class="d-flex align-items-center gap-2">
                        <label for="quantity" class="fw-bold mb-0" style="font-size: 0.9rem;">Số lượng: </label>
        
                        <input type="number" id="quantity" name="quantity" value="1" min="1" 
                            class="form-control text-center" style="width: 100px; height: 38px;">

                        <button type="submit" class="btn btn-primary fw-bold shadow-sm d-flex align-items-center" style="height: 38px;">
                            <i class="fa fa-shopping-cart me-2"></i>Thêm vào giỏ hàng
                        </button>
                    </div>
                </form>  
            </div>
        </div>
    </div>

    <style>
        .product-image-container {
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #eee;
        }
        .text-justify {
            text-align: justify;
        }
    </style>
</x-cay-canh-layout>