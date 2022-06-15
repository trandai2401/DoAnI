<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    // protected $table = "bai_viets";

    public function image()
    {
        return $this->hasMany(HinhAnh::class, 'baiviet_id', 'id');
    }


    public function comment()
    {
        return $this->hasMany(BinhLuan::class, 'baiviet_id', 'id');
    }
}
