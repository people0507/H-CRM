<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contract;
use Illuminate\Http\Request;

class HopDongController extends Controller
{

    public function index()
    {
       $hopDong = Contract::paginate(10);
       $lienKet = asset('contracts'); 
       $mode = 2;
       $batTimKiem = 1;
       return view('index',compact('hopDong','mode','lienKet','batTimKiem'));
    }


    public function create()
    {
        //
    }


    public function store($id,Request $request)
    {
        $duLieuHopDong = $request->all();
        if($duLieuHopDong){
            if(($duLieuHopDong['ngay_ky_hd'] > $duLieuHopDong['ngay_hieu_luc'])){
                return redirect()->back()->with('failed', 'Ngày ký hợp đồng không được lớn hơn ngày hiệu lực !!!');
            }else if(($duLieuHopDong['ngay_hieu_luc'] > $duLieuHopDong['ngay_het_han'])){
                return redirect()->back()->with('failed', 'Ngày hiệu lực không được lớn hơn ngày hết hạn !!!');
            }else if(($duLieuHopDong['ngay_ky_hd'] > $duLieuHopDong['ngay_het_han'])){
                return redirect()->back()->with('failed', 'Ngày ký hợp đồng không được lớn hơn ngày hết hạn !!!');
            }
            else{
                $file = $request->file('file_hd');
                $fileSize = $file->getSize();
                if($fileSize >  30 * 1024 * 1024){
                    return redirect()->back()->with('failed', 'File không được lớn hơn 30 MB !!!');
                }
                else{
                    $tenBanDau = $file->getClientOriginalName();
                    $tenMoi = now()->format('Y-m-d_H-i-s') . '_' . $tenBanDau;
                    $duong_dan = public_path('contracts');
                    $file->move( $duong_dan, $tenMoi);

                    $hopDong = new Contract();
                    $hopDong->ten_hd = $duLieuHopDong['ten_hd'];
                    $hopDong->dich_vu_su_dung = $duLieuHopDong['dvsd'];
                    $hopDong->ngay_ky_hd = $duLieuHopDong['ngay_ky_hd'];
                    $hopDong->ngay_hieu_luc = $duLieuHopDong['ngay_hieu_luc'];
                    $hopDong->ngay_het_han_hd = $duLieuHopDong['ngay_het_han'];
                    $hopDong->tep_tin = $tenMoi;
                    $hopDong->id_kh_fk = $id;
                    $hopDong->id_nv_fk = Contract::EMPLOYEE1;
                    $hopDong->save();
        
                    if ($hopDong->save()) {
                        return redirect()->back()->with('success', 'Tạo hợp đồng thành công !!!');
                    } else {
                        return redirect()->back()->with('failed', 'Tạo hợp đồng không thành công !!!');
                    }
                }
            }
        }
    }

    public function search(Request $request)
    {
        $duLieu = $request->all();
       $lienKet = asset('contracts'); 
        if(isset($duLieu['hop_dong']) && $duLieu['hop_dong']){
            $hopDong = Contract::where('ten_hd', 'like','%' . $duLieu['key_word'] . '%')
                                ->paginate(10)->withQueryString();
            $mode = 2;
        }
        return view('index',compact('hopDong','mode','lienKet'));
    }  

    public function show($id)
    {
        $tenKhachHang = Client::where('id_kh',$id)->first();
        $hopDong = Contract::where('id_kh_fk',$id)->paginate(10);
        $lienKet = asset('contracts');
        $mode = 2;
        return view('index',compact('hopDong','mode','lienKet','tenKhachHang'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function upgrade(Request $request, $id)
    {
        
        $duLieuHopDong = $request->all();
        if($duLieuHopDong){
            if(($duLieuHopDong['ngay_ky_hd'] > $duLieuHopDong['ngay_hieu_luc'])){
                return redirect()->back()->with('failed', 'Ngày ký hợp đồng không được lớn hơn ngày hiệu lực !!!');
            }else if(($duLieuHopDong['ngay_hieu_luc'] > $duLieuHopDong['ngay_het_han'])){
                return redirect()->back()->with('failed', 'Ngày hiệu lực không được lớn hơn ngày hết hạn !!!');
            }else if(($duLieuHopDong['ngay_ky_hd'] > $duLieuHopDong['ngay_het_han'])){
                return redirect()->back()->with('failed', 'Ngày ký hợp đồng không được lớn hơn ngày hết hạn !!!');
            }
            else{
                $file = $request->file('file_hd');
                $fileSize = $file->getSize();
                if($fileSize >  30 * 1024 * 1024){
                    return redirect()->back()->with('failed', 'File không được lớn hơn 30 MB !!!');
                }else{
                    $tenBanDau = $file->getClientOriginalName();
                    $tenMoi = now()->format('Y-m-d_H-i-s') . '_' . $tenBanDau;
                    $duong_dan = public_path('contracts');
                    $file->move( $duong_dan, $tenMoi);
        
                    $khachHang = Client::where('id_kh',$id)->first();
                    $khachHang->trang_thai = Client::VIP;
                    $khachHang->save();
                    
                    $hopDong = new Contract();
                    $hopDong->ten_hd = $duLieuHopDong['ten_hd'];
                    $hopDong->dich_vu_su_dung = $duLieuHopDong['dvsd'];
                    $hopDong->ngay_ky_hd = $duLieuHopDong['ngay_ky_hd'];
                    $hopDong->ngay_hieu_luc = $duLieuHopDong['ngay_hieu_luc'];
                    $hopDong->ngay_het_han_hd = $duLieuHopDong['ngay_het_han'];
                    $hopDong->tep_tin = $tenMoi;
                    $hopDong->id_kh_fk = $id;
                    $hopDong->id_nv_fk = Contract::EMPLOYEE1;
                    $hopDong->save();
        
                    if ($hopDong->save()) {
                        return redirect()->back()->with('success', 'Chuyển lên Khách hàng DV thành công !!!');
                    } else {
                        return redirect()->back()->with('failed', 'Chuyển lên Khách hàng DV không thành công !!!');
                    }
                }
                
            }
           
        }
    }


    public function destroy($id)
    {
        //
    }
}
