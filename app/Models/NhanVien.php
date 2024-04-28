<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NhanVien extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = "nhanvien";
}
