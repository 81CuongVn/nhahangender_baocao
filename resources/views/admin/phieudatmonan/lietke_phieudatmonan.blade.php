@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê phiếu đặt món ăn
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Bulk action</option>
                <option value="1">Delete selected</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
            <div class="input-group">
                <input type="text" class="input-sm form-control" placeholder="Search">
                <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
                </span>
            </div>
            </div>
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

                <thead> <?php $i=1?>
                    <tr>

                    <th>Mã phiếu</th>
                    <th>Tên khách hàng</th>
                    <th>Thời gian</th>
                    <th>Nhà hàng</th>
                    {{-- <th>Món ăn</th>
                    <th>Số lượng</th> --}}
                    {{-- <th>Tổng tiền</th> --}}
                    <th>Thanh Toán</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                    <th style="width:30px;"></th>
                    </tr>
                </thead>

                @foreach ($lietke_phieudatmonan as $key => $phieudatmonan)

                <tbody>
                    <tr>
                    <td>{{$phieudatmonan->IdDatMon}}</td>
                    {{-- <td>{{$phieudatmonan->IdDatMon}} </td> --}}
                    <td>{{$phieudatmonan->TenKH}} </td>
                    <td>{{$phieudatmonan->ThoiGianDat}} </td>
                    <td>{{$phieudatmonan->TenNhaHang}} </td>
                    {{-- <td>{{$phieudatmonan->TenMon}} </td>
                    <td>{{$phieudatmonan->SoLuongMon}} </td> --}}
                    {{-- <td>{{number_format($phieudatmonan->TongGiaTien)}} </td> --}}
                    <td>{{$phieudatmonan->PhuongThucThanhToan==0?'Tiền mặt':'ATM'}} </td>
                    <td>
                        @if ($phieudatmonan->TrangThai == 0)
                        <a onclick="return confirm('Chuyển trạng thái thành Đang giao?')" href="{{ route('Admin.mon', ['id'=>$phieudatmonan->IdDatMon]) }}" title="Click để chuyển trạng thái đang giao"><span class="badge badge-warning">Chờ giao</span></a>
                        <br>
                        <a onclick="return confirm('Bạn có chắc chắn huỷ phiếu?')" href="{{ route('Admin.mon3', ['id'=>$phieudatmonan->IdDatMon]) }}" title="Click để huỷ phiếu"><span style="color:red">Huỷ phiếu</span></a>
                        @elseif ($phieudatmonan->TrangThai == 1)
                        <a onclick="return confirm('Chuyển trạng thái thành Đã giao?')" href="{{ route('Admin.mon2', ['id'=>$phieudatmonan->IdDatMon]) }}" title="Click để chuyển trạng thái đã giao"><span class="badge badge-success">Đang giao</span>
                        @elseif ($phieudatmonan->TrangThai == 2)
                            <span class="badge badge-primary">Đã giao</span>
                        @else
                            <span class="badge badge-danger">Đã huỷ</span>
                        @endif

                    </td>
                    <td>
                        <a style="margin: 6px" onclick="return alert('Tính năng này đang phát triển!')" href="#" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        <a style="margin: 6px" onclick="return confirm('Bạn có chắc chắn xoá không?')" href="{{URL::to('/xoa-phieudatmonan/'.$phieudatmonan->IdDatMon)}}" class="active styling-delete" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                        <a style="margin: 6px" class="btn btn-warning" href="{{ route('Admin.chi-tiet', ['id'=>$phieudatmonan->IdDatMon]) }}">Xem chi tiết</a>
                    </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

        {{-- <footer class="panel-footer">
            <div class="row">

            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
            </div>
        </footer> --}}
        <footer class="panel-footer">
            <div class="row">

            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">Hiển thị 5 phiếu đặt</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                {{ $lietke_phieudatmonan->links() }}
            </div>
            </div>
        </footer>
    </div>
</div>

@endsection
