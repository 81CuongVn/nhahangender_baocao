<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\KhachHang;
use App\PhieuDatBan;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PhieuDatBanController extends Controller
{

    // Hàm kiểm tra có admin id không (đã đăng nhập)
    public function nvauthlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    // Thêm phiếu đặt bàn
    public function them_phieudatban(){
        $this->nvauthlogin();
        return view('admin.phieudatban.them_phieudatban');
    }

    // public function lietketheoten(){
    //     $this->nvauthlogin();
    //     //Lấy dữ liệu từ bảng khachhang tham gia vào bảng phieudatban theo IdKH
    //     $lietke_pdbtheoten = DB::table('khachhang')
    //     ->join('phieudatban','phieudatban.IdKH','=','khachhang.IdKH')
    //     ->get();

    //     //$lietke_pdbtheoten = view('admin.phieudatban.lietke_phieudatban')->with('lietke_phieudatban',$lietke_pdbtheoten);

    //     //return view('admin_layout')->with('admin.phieudatban.lietke_phieudatban',$quanly_phieudatban);
    //     return view('admin.phieudatban.lietke_phieudatban',compact('lietke_pdbtheoten'));
    // }

    // Xem phiếu đặt bàn
    public function lietke_phieudatban(){
        $this->nvauthlogin();
        //Lấy dữ liệu từ bảng khachhang tham gia vào bảng phieudatban theo IdKH
        $lietke_phieudatban = DB::table('phieudatban')
        ->join('khachhang','khachhang.IdKH','=','phieudatban.IdKH')
        ->join('nhahang','nhahang.IdNhaHang','=','phieudatban.IdNhaHang')
        ->orderBy('TinhTrang','asc')
        ->paginate(5);

        $quanly_phieudatban = view('admin.phieudatban.lietke_phieudatban')->with('lietke_phieudatban',$lietke_phieudatban);

        return view('admin_layout')->with('admin.phieudatban.lietke_phieudatban',$quanly_phieudatban);
        //return view('admin.phieudatban.lietke_phieudatban',compact('lietke_phieudatban'));
    }

    // public function timkiem_pdb(Request $request){
    //     $data = array();
    //     $data['TenKH']=$request->TenKH;
    //     DB::table('nhanvien')->select($data);
    //     Session::put('message','Thêm nhân viên thành công');
    // }

    public function duyetBan($id){
        DB::table('phieudatban')->where('IdDatBan',$id)->update([
                'TinhTrang' => 1
            ]);
        return redirect()->back();
    }

    public function duyetBan2($id){
        DB::table('phieudatban')->where('IdDatBan',$id)->update([
                'TinhTrang' => 2
            ]);
        return redirect()->back();
    }

    // Lưu phiếu đặt bàn
    public function luu_phieudatban(Request $request){
        $data = array();
        $data['IdDatBan'] = $request->IdDatBan;
        $data['IdKH'] = $request->IdKH;
        $data['ThoiGian'] = $request->ThoiGian;
        $data['SoLuongBan'] = $request->SoLuongBan;
        $data['IdNhaHang'] = $request->IdNhaHang;

        DB::table('phieudatban')->insert($data);
        Session::put('message','Thêm phiếu đặt bàn thành công');
        return Redirect::to('them-phieudatban');
    }

    // Sửa phiếu đặt bàn
    public function sua_phieudatban($IdDatBan){
        $this->nvauthlogin();
        $sua_phieudatban = DB::table('phieudatban')->where('IdDatBan',$IdDatBan)->get();
        $quanly_phieudatban = view('admin.phieudatban.sua_phieudatban')->with('sua_phieudatban',$sua_phieudatban);

        return view('admin_layout')->with('admin.phieudatban.sua_phieudatban',$quanly_phieudatban);
    }

    public function capnhat_phieudatban(Request $request, $IdDatBan){
        $data = array();
        $data['IdDatBan'] = $request->IdDatBan;
        $data['IdKH'] = $request->IdKH;
        $data['ThoiGian'] = $request->ThoiGian;
        $data['SoLuongBan'] = $request->SoLuongBan;

        DB::table('phieudatban')->where('IdDatBan',$IdDatBan)->update($data);
        Session::put('message','Cập nhật phiếu đặt bàn thành công');
        return Redirect::to('lietke-phieudatban');
    }


    public function xoa_phieudatban($IdDatBan){
        $this->nvauthlogin();
        DB::table('phieudatban')->where('IdDatBan',$IdDatBan)->delete();
        Session::put('message','Xoá phiếu đặt bàn thành công');
        return Redirect::to('lietke-phieudatban');
    }


    public function huyDon($idDon)
    {
        DB::table('phieudatban')->where('IdDatBan',$idDon)->update(['TinhTrang' => 2]);
        Session::flash('message-del','Hủy đặt bàn thành công');
        return redirect()->back();
    }
}
