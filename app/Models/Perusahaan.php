<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';
    protected $guarded = ['id'];
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
