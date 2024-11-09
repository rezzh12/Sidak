<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahir extends Model
{
    use HasFactory;
    public function kartuk()
    {
        return $this->belongsTo(KK::class, 'k_k_s_id','id')
                        ->withDefault(['id' => 'No KK Belum Dipilih']);
    }
}
