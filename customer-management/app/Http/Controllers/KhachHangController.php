<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class KhachHangController extends Controller
{

    public function index()
    {
        $khachHang = Client::where('trang_thai',0)->paginate(10);
        $mode = 1;
        return view('index',compact('khachHang', 'mode'));
    }

    public function index1()
    {
        $khachHang = Client::where('trang_thai',1)->paginate(10);
        $mode = 3;
        return view('index',compact('khachHang', 'mode'));
    }


    public function store(Request $request)
    {
        $duLieuKhachHang = $request->all();
       if($duLieuKhachHang){
            $khachHang = new Client();
            $khachHang->ten_kh = $duLieuKhachHang['ten_kh'];
            $khachHang->sdt = $duLieuKhachHang['sdt_kh'];
            $khachHang->dia_chi = $duLieuKhachHang['dia_chi'];
            $khachHang->ngay_sinh_kh = $duLieuKhachHang['ngay_sinh'];
            $khachHang->email = $duLieuKhachHang['email'];
            $khachHang->gioi_tinh = $duLieuKhachHang['gioi_tinh'];
            $khachHang->cccd = $duLieuKhachHang['cccd'];
            $khachHang->nganh_nghe = $duLieuKhachHang['nganh_nghe'];
            $khachHang->trang_thai = Client::NORMAL;
            $khachHang->save();
            if ($khachHang->save()) {
                return redirect()->back()->with('success', 'Thêm khách hàng thành công !!!');
            } else {
                return redirect()->back()->with('failed', 'Thêm khách hàng không thành công !!!');
            }
        }
        
    }

    public function search(Request $request)
    {
        $duLieu = $request->all();
        if(isset($duLieu['khcs']) && $duLieu['khcs']){
            $khachHang = Client::where('ten_kh', 'like','%' . $duLieu['key_word'] . '%')
                                ->where('trang_thai',0)
                                ->paginate(10)->withQueryString();
            $mode = 1;
        }
        if(isset($duLieu['khdv']) && $duLieu['khdv']){
            $khachHang = Client::where('ten_kh', 'like','%' . $duLieu['key_word'] . '%')
                                ->where('trang_thai',1)
                                ->paginate(10)->withQueryString();
            $mode = 3;
        }
        return view('index',compact('khachHang','mode'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        
        $duLieuKhachHang = $request->all();
       if($duLieuKhachHang){
            $khachHang = Client::where('id_kh',$id)->first();
            $khachHang->ten_kh = $duLieuKhachHang['ten_kh'];
            $khachHang->sdt = $duLieuKhachHang['sdt_kh'];
            $khachHang->dia_chi = $duLieuKhachHang['dia_chi'];
            $khachHang->ngay_sinh_kh = $duLieuKhachHang['ngay_sinh'];
            $khachHang->email = $duLieuKhachHang['email'];
            $khachHang->gioi_tinh = $duLieuKhachHang['gioi_tinh'];
            $khachHang->cccd = $duLieuKhachHang['cccd'];
            $khachHang->nganh_nghe = $duLieuKhachHang['nganh_nghe'];
            $khachHang->save();
            if ($khachHang->save()) {
                return redirect()->back()->with('success', 'Cập nhật khách hàng thành công !!!');
            } else {
                return redirect()->back()->with('failed', 'Cập nhật khách hàng không thành công !!!');
            }
        }
    }


    public function destroy($id)
    {
        if(isset($id)) {
            $khachHang = Client::where('id_kh', $id)->delete();
            if ($khachHang) {
                return redirect()->back()->with('success', 'Xóa khách hàng thành công !!!');
            } else {
                return redirect()->back()->with('failed', 'Xóa khách hàng không thành công !!!');
            }
        } else {
            return redirect()->back()->with('failed', 'Không tìm thấy ID khách hàng !!!');
        }
    }
}
