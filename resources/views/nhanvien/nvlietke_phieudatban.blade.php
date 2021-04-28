@extends('nv_layout')
@section('nv_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê phiếu đặt bàn
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">

                {{-- Thông báo --}}
                <?php
                    $message = Session::get('message');
                    if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                    }
                ?>

                <thead>
                    <tr>
                    <th>Mã phiếu</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Nhà hàng</th>
                    <th>Thời gian</th>
                    <th>Số lượng bàn</th>
                    <th>Trạng thái</th>
                    <th style="width:30px;"></th>
                    </tr>
                </thead>

                @foreach ($lietke_phieudatban as $key => $phieudatban)

                <tbody>
                    <tr>
                    <td>{{$phieudatban->IdDatBan}} </td>
                    <td>{{$phieudatban->TenKH}} </td>
                    <td>{{$phieudatban->SdtKH}} </td>
                    <td>{{$phieudatban->TenNhaHang}} </td>
                    <td>{{$phieudatban->ThoiGian}} </td>
                    <td>{{$phieudatban->SoLuongBan}} </td>
                    {{-- <td>{{ $phieudatban->TinhTrang == 0 ? 'Chưa duyệt' : 'Đã duyệt' }}</td> --}}
                    <td>
                        @if ($phieudatban->TinhTrang == 0)
                            <a onclick="return confirm('Bạn có chắc chắn duyệt không?')" href="{{ route('nv.ban', ['id'=>$phieudatban->IdDatBan]) }}" title="Click để duyệt"><span class="badge badge-warning">Chưa duyệt</span></a>
                            <br>
                            <a onclick="return confirm('Bạn có chắc chắn huỷ phiếu?')" href="{{ route('nv.ban2', ['id'=>$phieudatban->IdDatBan]) }}" title="Click để huỷ phiếu"><span style="color:red">Huỷ phiếu</span></a>
                        @elseif ($phieudatban->TinhTrang == 1)
                            <span class="badge badge-primary">Đã duyệt</span>
                        @else
                            <span class="badge badge-danger">Đã huỷ</span>
                        @endif
                    </td>
                    <td>
                        <a onclick="return alert('Tính năng này đang phát triển!')" href="#" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="#" class="active styling-delete" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                        {{-- @if ($phieudatban->TinhTrang == 0)
                            <a href="{{ route('Admin.ban', ['idPhieu'=>$phieudatban->IdDatBan]) }}" class="btn btn-success">
                                Duyệt
                            </a>
                        @else
                        @endif --}}
                    </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

        <footer class="panel-footer">
            <div class="row">

            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">Hiển thị 5 phiếu đặt</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                {{ $lietke_phieudatban->links() }}
            </div>
            </div>
        </footer>
    </div>
</div>

@endsection
