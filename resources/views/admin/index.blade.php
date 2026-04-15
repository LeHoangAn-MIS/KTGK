<x-cay-canh-layout>
    <x-slot name="title">Quản lý sản phẩm</x-slot>  {{-- Đóng ngay lập tức --}}

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <h3 class="text-center text-primary fw-bold my-3">QUẢN LÝ SẢN PHẨM</h3>

    <a href="{{ url('admin/sanpham/them') }}" class="btn btn-success mb-3">Thêm</a>

    <div style="width:100%; overflow-x:auto;">
        <table id="id-table" class="table table-bordered table-hover bg-white">
            <thead class="thead-light">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Tên khoa học</th>
                    <th>Tên thông thường</th>
                    <th>Độ khó</th>
                    <th>Yêu cầu ánh sáng</th>
                    <th>Nhu cầu nước</th>
                    <th>Giá bán</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->ten_san_pham }}</td>
                    <td>{{ $row->ten_khoa_hoc }}</td>
                    <td>{{ $row->ten_thong_thuong }}</td>
                    <td>{{ $row->do_kho }}</td>
                    <td>{{ $row->yeu_cau_anh_sang }}</td>
                    <td>{{ $row->nhu_cau_nuoc }}</td>
                    <td>{{ number_format($row->gia_ban, 2, ',', '.') }}</td>
                    <td>
                        <img src="{{ asset('storage/image/' . $row->hinh_anh) }}"
                            width="70"
                            style="border-radius:4px; object-fit:contain; height:70px;">
                    </td>
                    <td style="white-space:nowrap;">
                        <a href="{{ url('admin/sanpham/xem/' . $row->id) }}"
                        class="btn btn-primary btn-sm">Xem</a>
                        <a href="{{ url('admin/sanpham/xoa/' . $row->id) }}"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function () {
        $('#id-table').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            bStateSave: true,
            autoWidth: false,
            dom: "<'row'<'col-sm-6'l><'col-sm-6 text-right'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-5'i><'col-sm-7 text-right'p>>",
        });
    });
    </script>
</x-cay-canh-layout>