<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class NhaHangController extends Controller
{
    public function authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index()
    {
        $nhaHang = DB::table('nhahang')->get();
        return view('admin.nhahang.index',compact('nhaHang'));
    }

    public function create()
    {
        $this->authlogin();
        return view('admin.nhahang.add');
    }

    public function store(Request $request)
    {
        $this->authlogin();
        $tenNhaHang = $request->tenNhaHang;
        $diaChi = $request->diaChi;
        $thanhPho = $request->thanhPho;

        DB::table('nhahang')->insert(
            [
                'TenNhaHang' => $tenNhaHang,
                'DiaChi' => $diaChi,
                'ThanhPho' => $thanhPho
            ]
        );

        return redirect()->route('nha-hang.index');
    }

    // Sửa nhà hàng
    public function sua_nhahang($IdNhaHang){
        $this->authlogin();
        //Lấy dữ liệu từ bảng loainhahang sắp xếp theo Tên loại
        //$loainhahang = DB::table('loainhahang')->orderBy('TenLoai','asc')->get();

        $sua_nhahang = DB::table('nhahang')->where('IdNhaHang',$IdNhaHang)->get();

        $quanly_nhahang = view('admin.nhahang.sua_nhahang')->with('sua_nhahang',$sua_nhahang);

        return view('admin_layout')->with('admin.nhahang.sua_nhahang',$quanly_nhahang);
    }

    public function capnhat_nhahang(Request $request, $IdNhaHang){
        $data = array();
        $data['IdNhaHang'] = $request->IdNhaHang;
        $data['TenNhaHang'] = $request->TenNhaHang;
        $data['DiaChi'] = $request->DiaChi;
        $data['ThanhPho'] = $request->ThanhPho;

        DB::table('nhahang')->where('IdNhaHang',$IdNhaHang)->update($data);
        Session::put('message','Cập nhật nhà hàng thành công');
        return Redirect::to('nha-hang');
    }


    public function xoa_nhahang($IdNhaHang){
        $this->authlogin();
        DB::table('nhahang')->where('IdNhaHang',$IdNhaHang)->delete();
        Session::put('message','Xoá nhà hàng thành công');
        return Redirect::to('nha-hang');
    }
}
