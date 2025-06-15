<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporKerja extends Model
{
    protected $table = 'laporkerja';
    protected $guarded = ['id'];
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }
}
