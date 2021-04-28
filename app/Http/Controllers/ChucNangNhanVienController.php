<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ChucNangNhanVienController extends Controller
{

    // Hàm kiểm tra có admin id không (đã đăng nhập)
    public function nvauthlogin(){
        $IdNV = Session::get('IdNV');
        if($IdNV){
            return Redirect::to('nhanvien.nvdashboard');
        }else{
            return Redirect::to('nhanvien')->send();
        }
    }

    // Xem phiếu đặt bàn
    public function lietke_phieudatban(){
        $this->nvauthlogin();
        //Lấy dữ liệu từ bảng khachhang tham gia vào bảng phieudatban theo IdKH
        $lietke_phieudatban = DB::table('phieudatban')
        ->join('khachhang','khachhang.IdKH','=','phieudatban.IdKH')
        ->join('nhahang','nhahang.IdNhaHang','=','phieudatban.IdNhaHang')
        ->orderBy('TinhTrang','asc')
        ->paginate(5);

        $quanly_phieudatban = view('nhanvien.nvlietke_phieudatban')->with('lietke_phieudatban',$lietke_phieudatban);

        return view('nv_layout')->with('nhanvien.nvlietke_phieudatban',$quanly_phieudatban);
    }

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

    // // Lưu phiếu đặt bàn
    // public function luu_phieudatban(Request $request){
    //     $data = array();
    //     $data['IdDatBan'] = $request->IdDatBan;
    //     $data['IdKH'] = $request->IdKH;
    //     $data['ThoiGian'] = $request->ThoiGian;
    //     $data['SoLuongBan'] = $request->SoLuongBan;
    //     $data['IdNhaHang'] = $request->IdNhaHang;

    //     DB::table('phieudatban')->insert($data);
    //     Session::put('message','Thêm phiếu đặt bàn thành công');
    //     return Redirect::to('them-phieudatban');
    // }

    // Sửa phiếu đặt bàn
    public function sua_phieudatban($IdDatBan){
        $this->nvauthlogin();
        $sua_phieudatban = DB::table('phieudatban')->where('IdDatBan',$IdDatBan)->get();
        $quanly_phieudatban = view('admin.phieudatban.sua_phieudatban')->with('sua_phieudatban',$sua_phieudatban);

        return view('nv_layout')->with('admin.phieudatban.sua_phieudatban',$quanly_phieudatban);
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

    public function lietke_phieudatmonan(){
        $this->nvauthlogin();
        //Lấy dữ liệu từ bảng ban tham gia vào bảng phieudatmonan theo IdBan
        $lietke_phieudatmonan = DB::table('phieudatmonan')
        ->join('khachhang','khachhang.IdKH','=','phieudatmonan.IdKH')
        ->join('nhahang','nhahang.IdNhaHang','=','phieudatmonan.IdNhaHang')
        ->orderBy('TrangThai','asc')
        ->paginate(5);

        $quanly_phieudatmonan = view('nhanvien.nvlietke_phieudatmonan')->with('lietke_phieudatmonan',$lietke_phieudatmonan);

        return view('nv_layout')->with('nhanvien.nvlietke_phieudatmonan',$quanly_phieudatmonan);
    }

    // Lưu phiếu đặt món ăn
    public function luu_phieudatmonan(Request $request){
        $data = array();
        $data['IdDatMon'] = $request->IdDatMon;
        $data['IdBan'] = $request->IdBan;
        $data['TenMonDat'] = $request->TenMonDat;

        DB::table('phieudatmonan')->insert($data);
        Session::put('message','Thêm phiếu đặt món ăn thành công');
        return Redirect::to('them-phieudatmonan');
    }

    // Sửa phiếu đặt món ăn
    public function sua_phieudatmonan($IdDatMon){
        $this->nvauthlogin();
        $sua_phieudatmonan = DB::table('phieudatmonan')->where('IdDatMon',$IdDatMon)->get();
        $quanly_phieudatmonan = view('admin.phieudatmonan.sua_phieudatmonan')->with('sua_phieudatmonan',$sua_phieudatmonan);

        return view('nv_layout')->with('admin.phieudatmonan.sua_phieudatmonan',$quanly_phieudatmonan);
    }

    public function ChiTietPhieu($IdDatMon){
        $this->nvauthlogin();
            //Lấy dữ liệu từ bảng ban tham gia vào bảng phieudatmonan theo IdBan
            $lietke_phieudatmonan = DB::table('phieudatmonan')
            ->join('khachhang','khachhang.IdKH','=','phieudatmonan.IdKH')
            ->join('chitietdatmon','chitietdatmon.IdDatMon','=','phieudatmonan.IdDatMon')
            ->join('monan','monan.IdMonAn','=','chitietdatmon.IdMonAn')
            ->where('chitietdatmon.IdDatMon',$IdDatMon)
            ->get();
            // dd($lietke_phieudatmonan);

        return view('nhanvien.chitietphieu',compact('lietke_phieudatmonan'));
    }

    public function capnhat_phieudatmonan(Request $request, $IdDatMon){
        $data = array();
        $data['IdDatMon'] = $request->IdDatMon;
        $data['IdBan'] = $request->IdBan;
        $data['TenMonDat'] = $request->TenMonDat;

        DB::table('phieudatmonan')->where('IdDatMon',$IdDatMon)->update($data);
        Session::put('message','Cập nhật phiếu đặt món ăn thành công');
        return Redirect::to('lietke-phieudatmonan');
    }


    public function DuyetMonAn($id){
       DB::table('phieudatmonan')->where('IdDatMon',$id)->update([
           'TrangThai'=>1
       ]);
       return redirect()->back();
    }

    public function DuyetMonAn2($id){
        DB::table('phieudatmonan')->where('IdDatMon',$id)->update([
            'TrangThai'=>2
        ]);
        return redirect()->back();
     }

     public function DuyetMonAn3($id){
        DB::table('phieudatmonan')->where('IdDatMon',$id)->update([
            'TrangThai'=>3
        ]);
        return redirect()->back();
     }


    public function xoa_phieudatmonan($IdDatMon){
        $this->nvauthlogin();
        DB::table('phieudatmonan')->where('IdDatMon',$IdDatMon)->delete();
        Session::put('message','Xoá phiếu đặt món ăn thành công');
        return Redirect::to('lietke-phieudatmonan');
    }
}
