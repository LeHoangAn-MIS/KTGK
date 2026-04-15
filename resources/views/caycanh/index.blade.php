<x-cay-canh-layout>
    <x-slot name="title">
        Cây cảnh
    </x-slot>
    
</x-cay-canh-layout>

<div class="row list-cay-canh mt-4"> @foreach ($cayCanh as $cay)
        <div class="col-md-3 mb-4"> <div class="card h-100 border-success shadow-sm cay-canh"> <img src="{{ asset('storage/image/' . $cay->hinh_anh) }}" 
                     class="card-img-top p-2" 
                     alt="{{ $cay->ten_cay }}">

                <div class="card-body d-flex flex-column text-center cay-canh-info"> <h5 class="card-title fw-bold text-success">{{ $cay->ten_cay }}</h5>
                    
                    <p class="card-text text-danger fw-bold mt-auto" style="font-style: italic;">
                        {{ number_format($cay->don_gia, 0, ',', '.') }} VNĐ
                    </p>
                    
                    <a href="{{ route('product.show', $cay->id) }}" class="btn btn-outline-success btn-sm mt-2">
                        Xem chi tiết
                    </a>
                </div>
            </div>
            </div>
    @endforeach
</div>