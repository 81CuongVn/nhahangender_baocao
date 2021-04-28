@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật nhà hàng
            </header>

            <div class="panel-body">
                @foreach ($sua_nhahang as $key => $sua)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/capnhat-nhahang/'.$sua->IdNhaHang)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhà hàng</label>
                            <input type="text" value="{{$sua->TenNhaHang}}" name="TenNhaHang" class="form-control" id="ten_mon" placeholder="Thêm tên món ăn">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" value="{{$sua->DiaChi}}" name="DiaChi" class="form-control" id="don_gia" placeholder="VNĐ">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thành phố</label>
                            <input type="text" value="{{$sua->ThanhPho}}" name="ThanhPho" class="form-control" id="don_gia" placeholder="VNĐ">
                        </div>

                        <button type="submit" name="capnhat_nhahang" class="btn btn-info">Cập nhật nhà hàng</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
