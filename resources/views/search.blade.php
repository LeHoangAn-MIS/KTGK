<x-cay-canh-layout>
    <x-slot name="title">
        Cây cảnh
    </x-slot>

    <div class="container mt-4">

    <h2>Kết quả: "{{ $keyword }}"</h2>

    <div class="list-cay-canh row">

        @forelse($products as $product)
            <div class="cay-canh col-md-4 mb-4">

                <!-- ẢNH -->
                <img src="{{ asset('storage/image/' . $product->hinh_anh) }}" class="img-fluid">

                <!-- THÔNG TIN -->
                <div class="cay-canh-info">
                    <h5>{{ $product->ten_san_pham }}</h5>
                    <p class="text-danger">{{ $product->gia }} VNĐ</p>
                </div>

            </div>
        @empty
            <p>Không tìm thấy sản phẩm</p>
        @endforelse

    </div>

</div>
</x-cay-canh-layout>

