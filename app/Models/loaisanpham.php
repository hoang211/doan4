<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    protected $table ='loaisanpham';
    protected $fillable = ['id', 'TenLoai', 'MoTa'];
}
