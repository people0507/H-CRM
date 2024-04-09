<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'ten_nv' => 'Trịnh Phương',
            'sdt' => '0976242679',
            'dia_chi' => 'Hà Nội',
            'tai_khoan' => 'abc',
            'mat_khau' => '123',
            'vai_tro' => 0,
        ]);
        
        User::create([
            'ten_nv' => 'Nguyễn Văn A',
            'sdt' => '0987654321',
            'dia_chi' => 'Hồ Chí Minh',
            'tai_khoan' => 'def',
            'mat_khau' => '456',
            'vai_tro' => 1,
        ]);
        
        User::create([
            'ten_nv' => 'Lê Thị B',
            'sdt' => '0912345678',
            'dia_chi' => 'Đà Nẵng',
            'tai_khoan' => 'ghi',
            'mat_khau' => '789',
            'vai_tro' => 0,
        ]);
        
        User::create([
            'ten_nv' => 'Phạm Văn C',
            'sdt' => '0965432109',
            'dia_chi' => 'Hải Phòng',
            'tai_khoan' => 'jkl',
            'mat_khau' => '101112',
            'vai_tro' => 1,
        ]);
        
        User::create([
            'ten_nv' => 'Hoàng Thị D',
            'sdt' => '0943210987',
            'dia_chi' => 'Cần Thơ',
            'tai_khoan' => 'mno',
            'mat_khau' => '131415',
            'vai_tro' => 0,
        ]);
        
        User::create([
            'ten_nv' => 'Vũ Văn E',
            'sdt' => '0900000001',
            'dia_chi' => 'Quảng Ninh',
            'tai_khoan' => 'pqr',
            'mat_khau' => '161718',
            'vai_tro' => 1,
        ]);
        
        User::create([
            'ten_nv' => 'Nguyễn Thị F',
            'sdt' => '0933333333',
            'dia_chi' => 'Vũng Tàu',
            'tai_khoan' => 'stu',
            'mat_khau' => '192021',
            'vai_tro' => 0,
        ]);
        
        User::create([
            'ten_nv' => 'Lý Văn G',
            'sdt' => '0922222222',
            'dia_chi' => 'Bình Dương',
            'tai_khoan' => 'vwx',
            'mat_khau' => '222324',
            'vai_tro' => 1,
        ]);
        
        User::create([
            'ten_nv' => 'Trần Thị H',
            'sdt' => '0955555555',
            'dia_chi' => 'An Giang',
            'tai_khoan' => 'yz',
            'mat_khau' => '252627',
            'vai_tro' => 0,
        ]);
        
        User::create([
            'ten_nv' => 'Nguyễn Văn I',
            'sdt' => '0977777777',
            'dia_chi' => 'Kiên Giang',
            'tai_khoan' => 'abcxyz',
            'mat_khau' => '282930',
            'vai_tro' => 1,
        ]);
        
    }
}
