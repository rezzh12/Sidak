<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    use HasFactory;
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id','id')
                        ->withDefault(['id' => 'NIK Belum Dipilih']);
    }
}
