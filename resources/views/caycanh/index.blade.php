<x-cay-canh-layout>
    <x-slot name="title">
        Cây cảnh
    </x-slot>
        <div style="margin:10px 0; display:flex; gap:8px; align-items:center; justify-content:center;">
            <span style="color:black; font-weight:bold;">Tìm kiếm theo</span>
                <a href="{{ url('caycanh/loc?sapxep=gia-tang-dan') }}">
                    <button class="btn btn-outline-dark btn-sm">Giá tăng dần</button>
                </a>
                <a href="{{ url('caycanh/loc?sapxep=gia-giam-dan') }}">
                    <button class="btn btn-outline-dark btn-sm">Giá giảm dần</button>
                </a>
                <a href="{{ url('caycanh/loc?filter=de-cham-soc') }}">
                    <button class="btn btn-outline-dark btn-sm">Dễ chăm sóc</button>                    </a>
                <a href="{{ url('caycanh/loc?filter=chiu-duoc-bong-ram') }}">
                    <button class="btn btn-outline-dark btn-sm">Chịu được bóng râm</button>
                </a>
        </div>
        <div class='list-cay-canh'>
            @foreach($data as $row)
                <div class="cay-canh">
                    <a href="{{ url('/caycanh/chitiet/' . $row->id) }}">
                        <img src="{{ asset('storage/image/' . $row->hinh_anh) }}"  style="width:100%; height:180px; object-fit:contain;"><br>
                        <b>{{$row->ten_san_pham}}</b><br/>
                        <i style="color:red; font-weight:bold;">{{number_format($row->gia_ban,0,",",".")}}đ</i>
                    </a>
                </div>
            @endforeach
        </div>
</x-cay-canh-layout>