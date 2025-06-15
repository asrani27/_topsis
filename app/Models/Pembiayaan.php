<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembiayaan extends Model
{
    protected $table = 'pembiayaan';
    protected $guarded = ['id'];
    public function komponen()
    {
        return $this->belongsTo(Komponen::class, 'komponen_id');
    }
}
