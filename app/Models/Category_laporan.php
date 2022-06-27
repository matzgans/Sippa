<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;

class Category_laporan extends Model
{
    use HasFactory;
    Protected $guarded = [];

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
