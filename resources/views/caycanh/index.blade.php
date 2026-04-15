<x-cay-canh-layout>
    <x-slot name="title">
        Cây cảnh
    </x-slot>
        <div class='list-cay-canh'>
            @foreach($data as $row)
                <div class="cay-canh">
                        <img src="{{ asset('storage/image/' . $row->hinh_anh) }}"  style="width:100%; height:180px; object-fit:contain;"><br>
                        <b>{{$row->ten_san_pham}}</b><br/>
                        <i style="color:red; font-weight:bold;">{{number_format($row->gia_ban,0,",",".")}}đ</i>
                </div>
            @endforeach
        </div>
</x-cay-canh-layout>