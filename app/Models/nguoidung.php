<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    use HasFactory;
    protected $table = 'nguoidung';
    protected $fillable = [
        'id','UserName',
        'PassWord','HoTen',
        'DiaChi','DienThoai',
        'Anh',
        'Email','NgayTao','TrangThai'
    ];
    public function getAuthPassword()
    {
        return $this->PassWord;
    }
}
