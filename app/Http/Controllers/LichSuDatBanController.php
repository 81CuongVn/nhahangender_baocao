<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class LichSuDatBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $IdKH = Session::get('IdKH');
        $KH = DB::table('khachhang')->where('IdKH',$IdKH)->first();

        $BanDaDat = DB::table('phieudatban')
        ->where('IdKH',$IdKH)
        ->join('nhahang','nhahang.IdNhaHang','phieudatban.IdNhaHang')
        ->orderBy('IdDatBan','desc')
        ->paginate(6);

        return view('pages.datban.index', compact('KH','BanDaDat'));
    }

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
