<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'ms_jenis';

    protected $primaryKey = 'jenis_id';

    protected $fillable = [
        'jenis_nama'
    ];

    public function mobil()
    {
        return $this->hasMany('App\Models\Mobil', 'jenis_id');
    }
}
