<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// front-end
Route::get('/','HomeController@index');

Route::get('/home','HomeController@index');

Route::get('/monan','HomeController@monan');


// hiện thị mớn
Route::get('/mon-the-loai/{id}','HomeController@GetAllMon')->name('kh-get-mon');



// Đặt bàn
    Route::get('/datban','HomeController@datban');

    Route::post('/xulydatban','HomeController@xulydatban');

// Đặt món

    Route::get('/datmon','HomeController@datmon')->name('datmon');

    Route::get('/giohang', 'HomeController@showdatmon')->name('showdatmon');

    Route::get('/xoa-item/{IdMonAn}', 'HomeController@xoa_item')->name('xoa_item');

    Route::get('/soluong', 'HomeController@soluong')->name('soluong');

    Route::get('tonggiatien', 'HomeController@tonggiatien')->name('tonggiatien');

    Route::post('/order', 'HomeController@order')->name('order');

    Route::get('/xulydatmon/{id}','HomeController@xulydatmon')->name('xulydatmon');

    Route::post('mgg','HomeController@mgg')->name('mgg');

// Khách hàng

    //Tài khoản
        Route::get('/dangky','TaiKhoanController@getdangky')->name('dangky');

        Route::post('/luu-dangky','TaiKhoanController@postdangky')->name('postdangky');

        Route::get('/dangnhap','TaiKhoanController@getlogin')->name('getdangnhap');

        Route::post('/postdangnhap','TaiKhoanController@postlogin');

            Route::get('/dangxuat','TaiKhoanController@dangxuat');

    //lich su dat ban
    Route::get('/lichsu-datban','LichSuDatBanController@index')->name('kh.lsdatban');

    Route::get('/huy-don/{idDon}', 'PhieuDatBanController@huyDon')->name('phieu-dat.huy-don');

    //Lịch sử đặt món
    Route::get('/lichsu-datmon','LichSuDatMonController@index')->name('kh.lsdatmon');

    Route::get('/huy-donmon/{idDon}', 'LichSuDatMonController@huyDon')->name('phieu-dat-mon.huy-don');

    Route::get('/chitiet-phieudatmonan/{id}','LichSuDatMonController@ChiTietPhieu')->name('kh.chi-tiet');

// show
Route::post('/luu-phieudatmonan','PhieuDatMonAnController@luu_phieudatmonan');

Route::post('/capnhat-phieudatmonan/{IdDatMon}','PhieuDatMonAnController@capnhat_phieudatmonan');


//Route::get('/thong-tin-chi-tiet', 'ThongTinChiTietController@index');

#Nhà hàng
Route::get('nha-hang', 'NhaHangController@index')->name('nha-hang.index');
Route::get('them-nha-hang', 'NhaHangController@create')->name('nha-hang.view-add');
Route::post('xu-ly-them-nha-hang', 'NhaHangController@store')->name('nha-hang.handle-add');

Route::get('/sua-nhahang/{IdNhaHang}','NhaHangController@sua_nhahang');

Route::get('/xoa-nhahang/{IdNhaHang}','NhaHangController@xoa_nhahang');

Route::post('/capnhat-nhahang/{IdNhaHang}','NhaHangController@capnhat_nhahang');

// Profile
Route::get('/sua-thongtin', 'TaiKhoanController@sua_thongtin')->name('sua_thongtin');
Route::post('/xu-ly-sua-thong-tin', 'TaiKhoanController@handleEdit')->name('thong-tin.chinh-sua');



//back-end
Route::get('/admin','AdminController@index');

Route::get('/dashboard','AdminController@show_dashboard')->name('dashboard');

Route::get('/logout','AdminController@logout');

Route::post('/admin-dashboard','AdminController@dashboard');



// Danh mục món ăn
    Route::get('/them-danhmuc','DanhMucMonAnController@them_danhmuc');

    Route::get('/lietke-danhmuc','DanhMucMonAnController@lietke_danhmuc');


    // show
    Route::post('/luu-danhmuc','DanhMucMonAnController@luu_danhmuc');


//Món ăn
    Route::get('/them-monan','MonAnController@them_monan');

    Route::get('/sua-monan/{IdMonAn}','MonAnController@sua_monan');

    Route::get('/xoa-monan/{IdMonAn}','MonAnController@xoa_monan');

    Route::get('/lietke-monan','MonAnController@lietke_monan');

    //Route::get('/monan','MonAnController@monan');

    // show
    Route::post('/luu-monan','MonAnController@luu_monan');

    Route::post('/capnhat-monan/{IdMonAn}','MonAnController@capnhat_monan');


//Sảnh
    Route::get('/them-sanh','SanhController@them_sanh');

    Route::get('/lietke-sanh','SanhController@lietke_sanh');


    // show
    Route::post('/luu-sanh','SanhController@luu_sanh');


// Loại bàn
    Route::get('/them-loaiban','LoaiBanController@them_loaiban');

    Route::get('/lietke-loaiban','LoaiBanController@lietke_loaiban');


    // show
    Route::post('/luu-loaiban','LoaiBanController@luu_loaiban');


// Bàn
    Route::get('/them-ban','BanController@them_ban');

    Route::get('/lietke-ban','BanController@lietke_ban');


    // show
    Route::post('/luu-ban','BanController@luu_ban');


// Lương
    Route::get('/them-luong','LuongController@them_luong');

    Route::get('/lietke-luong','LuongController@lietke_luong');


    // show
    Route::post('/luu-luong','LuongController@luu_luong');


// Chức vụ
    Route::get('/them-chucvu','ChucVuController@them_chucvu');

    Route::get('/lietke-chucvu','ChucVuController@lietke_chucvu');


    // show
    Route::post('/luu-chucvu','ChucVuController@luu_chucvu');


// Nhân viên
    Route::get('/them-nhanvien','NhanVienController@them_nhanvien');

    Route::get('/sua-nhanvien/{IdNhanVien}','NhanVienController@sua_nhanvien');

    Route::get('/xoa-nhanvien/{IdNhanVien}','NhanVienController@xoa_nhanvien');

    Route::get('/lietke-nhanvien','NhanVienController@lietke_nhanvien');


    // show
    Route::post('/luu-nhanvien','NhanVienController@luu_nhanvien');

    Route::post('/capnhat-nhanvien/{IdNhanVien}','NhanVienController@capnhat_nhanvien');


// Khách hàng
    Route::get('/them-khachhang','KhachHangController@them_khachhang');

    Route::get('/sua-khachhang/{IdKH}','KhachHangController@sua_khachhang');

    Route::get('/xoa-khachhang/{IdKH}','KhachHangController@xoa_khachhang');

    Route::get('/lietke-khachhang','KhachHangController@lietke_khachhang');


    // show
    Route::post('/luu-khachhang','KhachHangController@luu_khachhang');

    Route::post('/capnhat-khachhang/{IdKH}','KhachHangController@capnhat_khachhang');


// Phiếu đặt bàn
    Route::get('/them-phieudatban','PhieuDatBanController@them_phieudatban');

    Route::get('/sua-phieudatban/{IdDatBan}','PhieuDatBanController@sua_phieudatban');

    Route::get('/xoa-phieudatban/{IdDatBan}','PhieuDatBanController@xoa_phieudatban');

    Route::get('/lietke-phieudatban','PhieuDatBanController@lietke_phieudatban');

    //Route::get('/duyet-ban/{idPhieu}', 'PhieuDatBanController@duyetBan')->name('phieu-dat.duyet-ban');

    Route::get('/duyet-ban/{id}', 'PhieuDatBanController@duyetBan')->name('Admin.ban');
    Route::get('/duyet-ban2/{id}', 'PhieuDatBanController@duyetBan2')->name('Admin.ban2');

    // show
    Route::post('/luu-phieudatban','PhieuDatBanController@luu_phieudatban');

    Route::post('/capnhat-phieudatban/{IdDatBan}','PhieuDatBanController@capnhat_phieudatban');


// Phiếu đặt món ăn
    Route::get('/them-phieudatmonan','PhieuDatMonAnController@them_phieudatmonan');

    Route::get('/sua-phieudatmonan/{IdDatMon}','PhieuDatMonAnController@sua_phieudatmonan');

    Route::get('/xoa-phieudatmonan/{IdDatMon}','PhieuDatMonAnController@xoa_phieudatmonan');

    Route::get('/lietke-phieudatmonan','PhieuDatMonAnController@lietke_phieudatmonan');


    Route::get('/duyet-phieudatmonan/{id}','PhieuDatMonAnController@DuyetMonAn')->name('Admin.mon');
    Route::get('/duyet-phieudatmonan2/{id}','PhieuDatMonAnController@DuyetMonAn2')->name('Admin.mon2');
    Route::get('/duyet-phieudatmonan3/{id}','PhieuDatMonAnController@DuyetMonAn3')->name('Admin.mon3');

    Route::get('/chi-tiet-phieudatmonan/{id}','PhieuDatMonAnController@ChiTietPhieu')->name('Admin.chi-tiet');

//Nhan vien
Route::get('/nhanvien','AdminController@nvindex');

Route::get('/nvdashboard','AdminController@nvshow_dashboard')->name('nvdashboard');

Route::get('/nvlogout','AdminController@nvlogout');

Route::post('/nv-dashboard','AdminController@nvdashboard')->name('nv_xuly');



    // Phiếu đặt bàn Nhan vien
    Route::get('/nvthem-phieudatban','ChucNangNhanVienController@them_phieudatban');

    Route::get('/nvsua-phieudatban/{IdDatBan}','ChucNangNhanVienController@sua_phieudatban');

    Route::get('/nvxoa-phieudatban/{IdDatBan}','ChucNangNhanVienController@xoa_phieudatban');

    Route::get('/nvlietke-phieudatban','ChucNangNhanVienController@lietke_phieudatban');

    //Route::get('/duyet-ban/{idPhieu}', 'ChucNangNhanVienController@duyetBan')->name('phieu-dat.duyet-ban');

    Route::get('/nvduyet-ban/{id}', 'ChucNangNhanVienController@duyetBan')->name('nv.ban');
    Route::get('/nvduyet-ban2/{id}', 'ChucNangNhanVienController@duyetBan2')->name('nv.ban2');

    // show
    Route::post('/nvluu-phieudatban','ChucNangNhanVienController@luu_phieudatban');

    Route::post('/nvcapnhat-phieudatban/{IdDatBan}','ChucNangNhanVienController@capnhat_phieudatban');


    // Phiếu đặt món ăn Nhan vien
    Route::get('/nvthem-phieudatmonan','ChucNangNhanVienController@them_phieudatmonan');

    Route::get('/nvsua-phieudatmonan/{IdDatMon}','ChucNangNhanVienController@sua_phieudatmonan');

    Route::get('/nvxoa-phieudatmonan/{IdDatMon}','ChucNangNhanVienController@xoa_phieudatmonan');

    Route::get('/nvlietke-phieudatmonan','ChucNangNhanVienController@lietke_phieudatmonan');


    Route::get('/nvduyet-phieudatmonan/{id}','ChucNangNhanVienController@DuyetMonAn')->name('nv.mon');

    Route::get('/nvduyet-phieudatmonan2/{id}','ChucNangNhanVienController@DuyetMonAn2')->name('nv.mon2');

    Route::get('/nvduyet-phieudatmonan3/{id}','ChucNangNhanVienController@DuyetMonAn3')->name('nv.mon3');

    Route::get('/nvchi-tiet-phieudatmonan/{id}','ChucNangNhanVienController@ChiTietPhieu')->name('nv.chi-tiet');
