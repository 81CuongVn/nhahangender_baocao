<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class LichSuDatMonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $IdKH = Session::get('IdKH');
        $KH = DB::table('khachhang')->where('IdKH',$IdKH)->first();

        $MonDaDat = DB::table('phieudatmonan')
        ->where('IdKH',$IdKH)
        ->join('nhahang','nhahang.IdNhaHang','=','phieudatmonan.IdNhaHang')
        ->orderBy('IdDatMon','desc')
        ->paginate(6);
        // ->join('chitietdatmon','chitietdatmon.IdDatMon','phieudatmon.IdDatMon')
        // ->join('nhahang','nhahang.IdNhaHang','chitietdatmon.IdNhaHang')
        // ->get();
        //dd($MonDaDat);
        return view('pages.datmon.index',compact('MonDaDat'));
    }

    public function huyDon($idDon)
    {
        DB::table('phieudatmonan')->where('IdDatMon',$idDon)->update(['TrangThai' => 3]);
        Session::flash('message-del','Hủy đơn thành công');
        return redirect()->back();
    }

    public function ChiTietPhieu($IdDatMon){
            //Lấy dữ liệu từ bảng ban tham gia vào bảng phieudatmonan theo IdBan
            $chitietdatmonan = DB::table('phieudatmonan')
            ->join('khachhang','khachhang.IdKH','=','phieudatmonan.IdKH')
            ->join('chitietdatmon','chitietdatmon.IdDatMon','=','phieudatmonan.IdDatMon')
            ->join('monan','monan.IdMonAn','=','chitietdatmon.IdMonAn')
            ->where('chitietdatmon.IdDatMon',$IdDatMon)
            ->get();
            // dd($chitietdatmonan);

        return view('pages.datmon.chitietdatmon',compact('chitietdatmonan','IdDatMon'));
    }
        // ->join('chitietdatmon','chitietdatmon.IdDatMon','=','phieudatmonan.IdDatMon')
        // ->join('monan','monan.IdMonAn','=','chitietdatmon.IdMonAn')
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
