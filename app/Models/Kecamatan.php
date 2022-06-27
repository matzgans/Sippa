<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;
class Kecamatan extends Model
{
    use HasFactory;
    Protected $guarded = [];

    public function kecamatan()
    {
        return $this->hasMany(Laporan::class);
    }
}
