<x-cay-canh-layout>
    <x-slot name="title">
        Chi tiết sản phẩm
    </x-slot>

    <div class="container mt-5">
        <div class="row cay-canh-info shadow-sm p-4 border rounded bg-white">
            <div class="col-md-5 text-center">
                <div class="border p-2 rounded">
                    <img src="{{ asset('storage/image/' . $product->hinh_anh) }}" 
                         class="img-fluid rounded" 
                         alt="{{ $product->ten_san_pham }}">
                </div>
            </div>

            <div class="col-md-10">
                <h3 class="fw-normal mb-3">{{ $product->ten_san_pham }}</h3>
                <div class="product-info" style="font-size: 0.95rem; line-height: 1.6;"> 
                    <p>Tên khoa học: {{ $product->ten_khoa_hoc }}</p>
                    <p>Tên thông thường: {{ $product->ten_thong_thuong }}</p>
                    <p>Mô tả: {{ $product->mo_ta }}</p>
                    <p>Quy cách sản phẩm: {{ $product->quy_cach_san_pham }}</p>
                    <p>Độ khó: {{ $product->do_kho }}</p>
                    <p>Yêu cầu ánh sáng: {{ $product->yeu_cau_anh_sang }}</p>
                    <p>Nhu cầu nước: {{ $product->nhu_cau_nuoc }}</p>
                    <p>Giá: <span class="text-danger fw-bold" style="font-style: italic;">
                            {{ number_format($product->gia_ban, 0, ',', '.') }} VNĐ
                        </span> </p>
                </div>

                <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                               
                        <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                          @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
    
                            <div class="d-flex align-items-center">
                                <span class="me-2">Số lượng mua: </span>
                                <input type="number" name="quantity" value="1" min="1" class="form-control w-25 me-3 text-center">
        
                                <button type="submit" class="btn btn-primary px-4">Thêm vào giỏ hàng</button>
                            </div>
                        </form>   
    
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-cay-canh-layout>