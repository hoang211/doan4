<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\sanpham;

class ChiTietHoaDonBan extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadonban';
    protected $fillable = [
        'MaSanPham',
        'MaHoaDon',
        'SoLuong',
        'TamTinh'
    ];
    public function sanpham(): HasOne
    {
        return $this->hasOne(Product::class,'id','idsanpham');
    }
}
