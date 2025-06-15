<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $guarded = ['id'];

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'pegawai_id');
    }
}
