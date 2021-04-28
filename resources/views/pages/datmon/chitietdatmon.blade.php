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
                                <h2 class="pricing-title">Chi tiết phiếu đặt món</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="table-responsive">
    <h2 style="color:#5c9233; text-align: center;"><b>Phiếu đặt món số {{$IdDatMon }}</b></h2>
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
    <table class="table table-striped b-t b-light">

        <thead>
            <?php $i=1?>
            <tr>
                <th>STT</th>
                <th>Món ăn</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
            </tr>
        </thead>

        @foreach ($chitietdatmonan as $key => $ctmonan)
        <tbody>
            <tr>
                <td> {{$i++}} </td>
                <td>{{$ctmonan->TenMon}} </td>
                <td>{{$ctmonan->SoLuongMon}} </td>
                <td>{{number_format($ctmonan->DonGiaMon * $ctmonan->SoLuongMon)}} </td>
            </tr>

        </tbody>
        @endforeach
        <tr>
            <td>Tổng số tiền</td>
            <td></td>
            <td></td>
            <td colspan="2" style='color:green'> {{number_format($ctmonan->TongGiaTien)}} VNĐ</td>
        </tr>
    </table>
    </div>

</div>
<div class="col-sm-1"></div>
<div class="col-sm-1">
    <a href="{{URL::to('/lichsu-datmon')}}"> ⇦ Quay lại</a>
</div>
<br><br>
@endsection
