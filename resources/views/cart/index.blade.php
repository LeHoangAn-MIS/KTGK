<x-cay-canh-layout>
    <div class="container py-4">
        <h4 class="text-center text-primary fw-bold mb-4">DANH SÁCH SẢN PHẨM</h4>
        
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php $stt = 1; @endphp
                @foreach($cart as $id => $item)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td class="text-start">{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['price'], 0, ',', '.') }}đ</td>
                    <td>
                        <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="fw-bold"><strong>Tổng cộng</strong></td>
                    <td class="fw-bold"><strong>{{ number_format($total, 0, ',', '.') }}đ</strong></td>
                    
                </tr>
            </tbody>
        </table>

        <form action="{{ route('cart.checkout') }}" method="POST" class="text-center mt-4">
            @csrf
            <div class="mb-2">
                <label class="fw-bold d-block mb-3"><strong>Hình thức thanh toán</strong></label>
                <select name="hinh_thuc_thanh_toan" class="form-select w-25 mx-auto">
                    <option value="1">Tiền mặt</option>
                    <option value="2">Chuyển khoản</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary px-5 fw-bold">ĐẶT HÀNG</button>
        </form>
    </div>
</x-cay-canh-layout>

