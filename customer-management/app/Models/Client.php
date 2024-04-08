<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'khachhang';
    protected $primaryKey = 'id_kh';

    protected $fillable = [
        'ten_kh',
        'sdt',
        'dia_chi',
        'ngay_sinh_kh',
        'email',
        'gioi_tinh',
        'cccd',
        'nganh_nghe',
        'trang_thai',
    ];

    public const NORMAL = 0;
    public const VIP = 1;

}
