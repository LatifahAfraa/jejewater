<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $primaryKey = 'kendaraan_id';

    protected $fillable = ['id_mobil', 'id_supir'];

    public function mobil()
    {
        return $this->belongsTo('App\Models\Mobil', 'id_mobil');
    }

    public function sopir()
    {
        return $this->belongsTo('App\Models\Sopir', 'id_sopir');
    }
}
