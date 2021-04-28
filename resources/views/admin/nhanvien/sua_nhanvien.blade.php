@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật nhân viên
            </header>

            <div class="panel-body">
                @foreach ($sua_nhanvien as $key => $sua)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/capnhat-nhanvien/'.$sua->IdNV)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID nhân viên</label>
                            <input type="number"value="{{$sua->IdNV}}" name="IdNV" class="form-control" id="id_nhanvien" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chức vụ</label>
                            <select name="IdCV" id="" class="form-control">
                                {{
                                    $chucvu = DB::table('chucvu')->get()
                                }}
                                @foreach ($chucvu as $item)
                                    <option value="{{ $item->IdCV }}">{{ $item->TenCV }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nhà Hàng</label>
                            <select name="IdNhaHang" id="" class="form-control">
                                {{
                                    $nhaHang = DB::table('nhahang')->get()
                                }}
                                @foreach ($nhaHang as $item)
                                    <option value="{{ $item->IdNhaHang }}">{{ $item->TenNhaHang }} - {{ $item->DiaChi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên</label>
                            <input type="text" value="{{$sua->TenNV}}" name="TenNV" class="form-control" id="ten_nv">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giới tính</label>
                            <input type="text" value="{{$sua->GioiTinhNV}}" name="GioiTinhNV" class="form-control" id="gioitinh_nv">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" value="{{$sua->SdtNV}}" name="SdtNV" class="form-control" id="sdt_nv">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" value="{{$sua->DiaChiNV}}" name="DiaChiNV" class="form-control" id="diachi_nv">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tài khoản</label>
                            <input type="text" value="{{$sua->TaiKhoanNV}}" name="TaiKhoanNV" class="form-control" id="taikhoan_nv">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" value="{{$sua->MatKhauNV}}" name="MatKhauNV" class="form-control" id="matkhau_nv">
                        </div>

                        <button type="submit" name="capnhat_nhanvien" class="btn btn-info">Cập nhật nhân viên</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
