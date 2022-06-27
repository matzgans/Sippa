<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Category_laporan, Pendamping, Kecamatan};
class Laporan extends Model
{
    use HasFactory;
    Protected $guarded = [];

    public function category_laporan()
    {
        return $this->belongsTo(Category_laporan::class);
    }

    public function pendamping()
    {
        return $this->belongsTo(Pendamping::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
