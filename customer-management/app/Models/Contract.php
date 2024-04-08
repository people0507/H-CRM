<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'hopdong';
    protected $fillable = [
        'ten_hd',
        'dich_vu_su_dung',
        'doanh_thu',
        'ngay_ky_hd',
        'ngay_hieu_luc',
        'ngay_het_han_hd',
        'tep_tin',
    ];

    public function nhanVien(){
        return $this->belongsTo(User::class,'id_nv_fk','id_nv');
    }

    public function khachHang(){
        return $this->belongsTo(Client::class,'id_kh_fk','id_kh');
    }

    public const EMPLOYEE1 = 1;
    public const EMPLOYEE2 = 2;
    public const EMPLOYEE3 = 3;

}
