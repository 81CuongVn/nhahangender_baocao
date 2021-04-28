<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $nhanvien = [[
            'nv_hoten'=>'Nguyễn Văn Tèo',
            'nv_sdt'=>'0236542523',
            'IdNhaHang'=>1,
            'IdCV'=>1,
            'nv_diachi'=>'Cần Thơ',
            'username'=>'nhanvien',
            'password'=>bcrypt('123')

        ]];

        DB::table('nhanvien1')->insert($nhanvien);
    }
}
