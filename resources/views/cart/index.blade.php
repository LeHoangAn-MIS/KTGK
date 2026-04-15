<x-cay-canh-layout>
    <x-slot name="title">Giỏ hàng</x-slot>
    <div class="container py-4">
        <h3 class="text-center text-primary fw-bold my-3">DANH SÁCH SẢN PHẨM</h3>
        
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th style="width:50px">STT</th>
                    <th>Tên sản phẩm</th>
                    <th style="width:100px" class="text-center">Số lượng</th>
                    <th style="width:120px" class="text-center">Đơn giá</th>
                    <th style="width:60px" class="text-center">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php $stt = 1; @endphp
                @foreach($cart as $id => $item)
                <tr>
                    <td class="text-center">{{ $stt++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td class="text-center">{{ $item['quantity'] }}</td>
                    <td class="text-center">{{ number_format($item['price'], 0, ',', '.') }}đ</td>
                    <td class="text-center">
                        <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-center fw-bold"><b>Tổng cộng</b></td>
                    <td class="text-center fw-bold"><b>{{ number_format($total, 0, ',', '.') }}đ</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('cart.checkout') }}" method="POST" class="text-center mt-3">
            @csrf
            <div class="mb-3">
                <label class="fw-bold d-block mb-3"><strong>Hình thức thanh toán</strong></label>
                <select name="hinh_thuc_thanh_toan" class="form-select mx-auto" style="width:150px; height:40px;">
                    <option value="1">Tiền mặt</option>
                    <option value="2">Chuyển khoản</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary px-3">ĐẶT HÀNG</button>
        </form>
    </div>
</x-cay-canh-layout>