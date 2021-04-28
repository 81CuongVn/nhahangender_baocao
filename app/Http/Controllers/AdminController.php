<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    // Hàm kiểm tra có admin id không (đã đăng nhập)
    public function authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->authlogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){
        $this ->authlogin();
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('admin')
        ->where('admin_email',$admin_email)
        ->where('admin_password',$admin_password)
        ->first();

        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Tài khoản hoặc mật khẩu không đúng !');
            return Redirect::to('/admin');
        }
    }

    public function logout(){
        $this ->authlogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }



    public function nvauthlogin(){
        $IdNV = Session::get('IdNV');
        if($IdNV){
            return Redirect::to('nhanvien.nvdashboard');
        }else{
            return Redirect::to('nhanvien')->send();
        }
    }
    public function nvindex(){
        return view('nhanvien.nvdangnhap');
    }

    public function nvshow_dashboard (){
        $this->nvauthlogin();
        return view('nhanvien.nvdangnhap');
    }

    public function nvdashboard(Request $request){
        // $arr = [
        //     'username' => $request->username,
        //     'password' => $request->password,
        // ];
        $this->nvauthlogin();
        $TaiKhoanNV = $request->TaiKhoanNV;
        $MatKhauNV = md5($request->MatKhauNV);

        $result = DB::table('nhanvien')
        ->where('TaiKhoanNV',$TaiKhoanNV)
        ->where('MatKhauNV',$MatKhauNV)
        ->first();

        // if (Auth::guard('nhanvien')->attempt($arr, true))
        if($result)
        {
            Session::put('TenNV',$result->TenNV);
            Session::put('IdNV',$result->IdNV);
            // return Redirect::to('/dashboard');
            return view('nhanvien.nvdashboard');
        } else {
            Session::put('message','Tài khoản hoặc mật khẩu không đúng !');
            return Redirect::to('/nhanvien');
        }
    }

    public function nvlogout(){
        $this->nvauthlogin();
        Session::put('TenNV',null);
        Session::put('IdNV',null);
        return Redirect::to('/nhanvien');
    }
}
