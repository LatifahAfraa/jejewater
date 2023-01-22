<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    protected $table = 'kondisi_ban';

    protected $primaryKey = 'id_kondisi';

    protected $fillable = ['kondisi'];

    public function ban()
    {
        return $this->hasMany('App\Models\Ban', 'id_kondisi');
    }

    public function kondisiambil()
    {
        return $this->hasMany('App\Models\Pemakaian', 'kondisi_ambil');
    }

    public function kondisikembali()
    {
        return $this->hasMany('App\Models\Pemakaian', 'kondisi_kembali');
    }
}
