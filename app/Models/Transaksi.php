<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $guarded = ['id'];
    public function dataumum()
    {
        return $this->belongsTo(Dataumum::class, 'dataumum_id');
    }
    public function pembiayaan()
    {
        return $this->belongsTo(Pembiayaan::class, 'pembiayaan_id');
    }
    public function komponen()
    {
        return $this->belongsTo(Komponen::class, 'komponen_id');
    }
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
