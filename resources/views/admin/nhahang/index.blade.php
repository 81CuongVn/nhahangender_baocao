@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê nhà hàng
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

                        <th>STT</th>
                        <th>Tên nhà hàng</th>
                        <th>Địa chỉ</th>
                        <th>Thành phố</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($nhaHang as $item)
                        <tr>
                            <td>{{ $item->IdNhaHang }}</td>
                            <td>{{ $item->TenNhaHang }}</td>
                            <td>{{ $item->DiaChi }}</td>
                            <td>{{ $item->ThanhPho}}</td>
                            <td>
                                <a href="{{URL::to('/sua-nhahang/'.$item->IdNhaHang)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="{{URL::to('/xoa-nhahang/'.$item->IdNhaHang)}}" class="active styling-delete" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
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
    </div>
</div>

@endsection
