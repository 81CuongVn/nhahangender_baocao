@extends('layout')
@section('content')



<section id="pricing" class="pricing">
    <div id="w">
        <div class="pricing-filter">
            <div class="pricing-filter-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="section-header">
                                <h2 class="pricing-title">Lịch sử đặt món</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h2 style="color: #5c9233; text-align:center"> Món ăn đã đặt</h2><br>
        <p style="color: greenyellow;">{{ Session::get('message-del') }}</p>
        {{-- {{dd($MonDaDat)}} --}}
        @foreach ($MonDaDat as $item)
        <div class="col-md-4">
            <div class="launch" style="height: 390px;padding: 10px;margin-bottom: 20px;background: #acdd73;box-shadow: 3px 4px #888888;font-size: 17px;">
                <h4 style="color:#5c9233; text-align: center;"><b>Mã phiếu: {{ $item->IdDatMon }}</b></h4>
                <p>Thời gian: {{ Carbon\Carbon::parse($item->ThoiGianDat)->format('H:m - d/m/Y') }}</p>
                <p>Tổng giá tiền: {{ number_format($item->TongGiaTien) }} ₫</p>
                <p>Phương thức thanh toán: {{ $item->PhuongThucThanhToan==0?'Tiền mặt':'ATM' }}</p>
                <p>Nhà hàng: {{ $item->TenNhaHang }}</p>
                <p>Địa điểm: {{ $item->DiaChi }}</p>
                <p>Trạng thái:
                    @if ($item->TrangThai == 0)
                        <span style="color: rgb(168, 168, 15)">Chờ giao</span>
                    @elseif ($item->TrangThai == 1)
                        <span style="color: green;">Đang giao</span>
                    @elseif ($item->TrangThai == 2)
                        <span style="color: green;">Đã giao</span>
                    @else
                        <span style="color: red;">Đã huỷ</span>
                    @endif
                </p>
                <p>
                    @if ($item->TrangThai == 0)
                        <a onclick="return confirm('Bạn có chắc chắn huỷ không?')" href="{{ route('phieu-dat-mon.huy-don', ['idDon'=>$item->IdDatMon ]) }}" style="color:red; "><u>Hủy đơn</u></a>
                    @endif
                </p>
                <a href="{{ route('kh.chi-tiet', ['id'=>$item->IdDatMon]) }}" style="font-weight:bold">
                    Xem chi tiết đơn
                </a>
                {{--
                    <p>
                    @if ($item->TrangThai == 0 || $item->TrangThai == 1)
                        <a href="{{ route('phieu-dat.huy-don', ['idDon'=>$item->IdDatMon ]) }}" style="font-weight: bold;">Hủy đơn</a>
                    @endif
                </p> --}}
            </div>
        </div>
            @endforeach
    </div>
</div>

<footer class="panel-footer">
    <div class="row">

        <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">Hiển thị 6 phiếu đặt</small>
        </div>
        <div class="col-sm-5 text-right text-center-xs">
            {{ $MonDaDat->links() }}
        </div>
    </div>
</footer>

@endsection
