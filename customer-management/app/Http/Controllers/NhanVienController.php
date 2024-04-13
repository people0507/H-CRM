<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\User;

class NhanVienController extends Controller
{
   
    public function index()
    {
        $mode = 4;
        $nhanVien = User::paginate(10);
        return view('index',compact('nhanVien','mode'));
    }

    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        $duLieuNhanVien = $request->all();
        $nhanVien = new User();
        $nhanVien -> ten_nv = $duLieuNhanVien['ten_nv'];
        $nhanVien -> sdt = $duLieuNhanVien['sdt'];
        $nhanVien -> dia_chi = $duLieuNhanVien['dia_chi'];
        $nhanVien -> tai_khoan = $duLieuNhanVien['tai_khoan'];
        $nhanVien -> mat_khau = $duLieuNhanVien['mat_khau'];
        $nhanVien -> vai_tro = $duLieuNhanVien['vai_tro'];
        $nhanVien -> save();
        if ($nhanVien->save()) {
            return redirect()->back()->with('success', 'Thêm nhân viên thành công !!!');
        } else {
            return redirect()->back()->with('failed', 'Thêm nhân viên không thành công !!!');
        }
    }

  
    public function show($id)
    {
        //
    }

 
    public function edit($id,Request $request)
    {
        $duLieuNhanVien = $request->all();
        $nhanVien = User::where('id_nv',$id)->first();
        $nhanVien->ten_nv = $duLieuNhanVien['ten_nv'];
        $nhanVien -> sdt = $duLieuNhanVien['sdt'];
        $nhanVien -> dia_chi = $duLieuNhanVien['dia_chi'];
        $nhanVien -> tai_khoan = $duLieuNhanVien['tai_khoan'];
        $nhanVien -> mat_khau = $duLieuNhanVien['mat_khau'];
        $nhanVien->vai_tro = $duLieuNhanVien['vai_tro'];
        $nhanVien->save();
        if ($nhanVien->save()) {
            return redirect()->back()->with('success', 'Cập nhật nhân viên thành công !!!');
        } else {
            return redirect()->back()->with('failed', 'Cập nhật nhân viên không thành công !!!');
        }
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        if(isset($id)) {
            $nhanVien = User::where('id_nv',$id)->delete();
            if ($nhanVien) {
                return redirect()->back()->with('success', 'Xóa nhân viên thành công !!!');
            } else {
                return redirect()->back()->with('failed', 'Xóa nhân viên không thành công !!!');
            }
        }else{
            return redirect()->back()->with('failed', 'không tìm thấy id nhân viên!!!');

        }
    }
}
