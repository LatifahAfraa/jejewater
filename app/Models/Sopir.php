<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    protected $table = 'supir';

    protected $primaryKey = 'id_supir';

    protected $fillable = [
        'nama_supir', 'no_ktp', 'no_sim', 'no_hp', 'alamat'
    ];

    public function kendaraan()
    {
        return $this->hasMany('App\Models\Kendaraan', 'id_supir');
    }
}
