<x-cay-canh-layout>
    <x-slot name="title">
        Chi tiết sản phẩm
    </x-slot>

    <div id="alert-success" 
        style="display:none; background:#d4edda; color:#155724; border:1px solid #c3e6cb; 
               padding:12px 20px; border-radius:6px; margin: 15px 0;">
        Đã thêm vào giỏ hàng!
    </div>

    <div class="mt-4">
        <div class="cay-canh-info">
            <div class="text-center p-2">
                <div class="p-2">
                    <img src="{{ asset('storage/image/' . $data->hinh_anh) }}" 
                         style="width: 100%; max-height: 280px; object-fit: contain;"
                         alt="{{ $data->ten_san_pham }}">
                </div>
            </div>

            <div class="p-2">
                <h3 style="font-weight: normal; margin-bottom: 15px;">{{ $data->ten_san_pham }}</h3>

                <div style="font-size: 0.95rem; line-height: 1.8;">
                    <p>Tên khoa học: {{ $data->ten_khoa_hoc }}</p>
                    <p>Tên thông thường: {{ $data->ten_thong_thuong }}</p>
                    <p>Mô tả: {{ $data->mo_ta }}</p>
                    <p>Quy cách sản phẩm: {{ $data->quy_cach_san_pham }}</p>
                    <p>Độ khó: {{ $data->do_kho }}</p>
                    <p>Yêu cầu ánh sáng: {{ $data->yeu_cau_anh_sang }}</p>
                    <p>Nhu cầu nước: {{ $data->nhu_cau_nuoc }}</p>
                    <p>Giá: <span style="color: red; font-weight: bold; font-style: italic;">
                        {{ number_format($data->gia_ban, 0, ',', '.') }} VNĐ
                    </span></p>
                </div>

                <form id="form-add-cart" style="margin-top: 20px;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $data->id }}">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span>Số lượng mua:</span>
                        <input type="number" name="quantity" value="1" min="1"
                            style="width:70px; text-align:center; padding:4px; border:1px solid #ccc; border-radius:4px;">
                        <button type="submit"
                                style="background-color:#23b85c; color:white; border:none; padding:8px 20px;
                                    border-radius:4px; cursor:pointer; font-size:14px;">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                </form>
                <script>
                let alertTimeout;

                document.getElementById('form-add-cart').addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);

                    fetch("{{ route('cart.add') }}", {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Hiện thông báo
                            const alert = document.getElementById('alert-success');
                            alert.style.display = 'block';

                            // Cập nhật số lượng icon giỏ hàng (nếu có)
                            const badge = document.getElementById('cart-number-product');
                            if (badge) badge.textContent = data.total_quantity;

                            // Tự ẩn sau 2 giây, reset nếu nhấn liên tục
                            clearTimeout(alertTimeout);
                            alertTimeout = setTimeout(() => {
                                alert.style.display = 'none';
                            }, 2000);
                        }
                    });
                });
                </script>
            </div>
        </div>
    </div>
</x-cay-canh-layout>