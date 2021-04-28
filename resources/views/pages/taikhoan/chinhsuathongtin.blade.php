@extends('layout')
@section('content')
{{-- Thông tin Khách hàng --}}

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h2 style="color: #5c9233; text-align:center"> Thông tin tài khoản</h2><br>
        <p style="color: green; text-align: center;">{{ Session::get('update-success') }}</p>
        <form action="{{ route('thong-tin.chinh-sua') }}" method="POST">
            @csrf
            <label>Họ và tên: *</label>
            <input class="form-control" type="text" name="TenKH" value="{{$KH->TenKH}}" required>
            <label>Tên hiển thị: *</label>
            <input class="form-control" type="text" name="TenHienThi" value="{{$KH->TenHienThi}}" required>
            <label>Số điện thoại: *</label>
            <input class="form-control" type="text" name="SdtKH" value="{{$KH->SdtKH}}" required>
            <label>Địa chỉ: *</label>
            <textarea class="form-control" name="DiaChiKH" rows="5" required>{{$KH->DiaChiKH}}</textarea>
            <label>Mật khẩu: </label>
            <input class="form-control" type="password" name="MatKhau" value="" placeholder="Đổi mật khẩu">

            <div align="center">
                <button type="submit" class="btn">Chỉnh sửa</button>
            </div>
        </form>
    </div>
    {{-- <div class="col-md-1"></div>
    <div class="col-md-4">
        <h2 style="color: #5c9233; text-align:center"> Bàn đã đặt</h2><br>
        <p style="color: greenyellow;">{{ Session::get('message-del') }}</p>
        @foreach ($banDaDat as $item)
        <div class="launch">
            <h4>Mã phiếu: {{ $item->IdDatBan }}</h4>
            <p>Số lượng bàn: {{ $item->SoLuongBan }}</p>
            <p>Thời gian: {{ Carbon\Carbon::parse($item->ThoiGian)->format('d/m/Y') }}</p>
            <p>Địa điểm: {{ $item->DiaChi }}</p>
            <p>Trạng thái:
                @if ($item->TinhTrang == 0)
                    <span style="color: rgb(32, 32, 3)">Chờ duyệt</span>
                @endif
                @if ($item->TinhTrang == 1)
                    <span style="color: green;">Đã duyệt</span>
                @endif
                @if ($item->TinhTrang == 2)
                    <span style="color: red;">Đã hủy</span>
                @endif
            </p>
            <p>
                @if ($item->TinhTrang == 0 || $item->TinhTrang == 1)
                    <a href="{{ route('phieu-dat.huy-don', ['idDon'=>$item->IdDatBan ]) }}" style="font-weight: bold;">Hủy đơn</a>
                @endif
            </p>
        </div>
        <br>
        @endforeach
    </div> --}}
</div>
<br>
@endsection
