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
       // Tạo người dùng 1
User::create([
    'ten_nv' => 'Trịnh Phương',
    'vai_tro' => 0,
]);

// Tạo người dùng 2
User::create([
    'ten_nv' => 'Nguyễn Hoa',
    'vai_tro' => 1,
]);

// Tạo người dùng 3
User::create([
    'ten_nv' => 'Nguyễn Thương',
    'vai_tro' => 1,
]);

// Tạo người dùng 4
User::create([
    'ten_nv' => 'Nguyễn Văn An',
    'vai_tro' => 0,
]);

// Tạo người dùng 5
User::create([
    'ten_nv' => 'Lê Thị Bích',
    'vai_tro' => 1,
]);

// Tạo người dùng 6
User::create([
    'ten_nv' => 'Phạm Minh Chiến',
    'vai_tro' => 0,
]);

// Tạo người dùng 7
User::create([
    'ten_nv' => 'Hoàng Thị Dung',
    'vai_tro' => 0,
]);

// Tạo người dùng 8
User::create([
    'ten_nv' => 'Trần Văn Đức',
    'vai_tro' => 1,
]);

// Tạo người dùng 9
User::create([
    'ten_nv' => 'Đinh Văn Hải',
    'vai_tro' => 0,
]);

// Tạo người dùng 10
User::create([
    'ten_nv' => 'Vũ Thị Thanh',
    'vai_tro' => 1,
]);
    }
}
