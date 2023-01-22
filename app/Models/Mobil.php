<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';

    protected $primaryKey = 'id_mobil';

    protected $fillable = [
        'no_polisi', 'jenis_kendaraan', 'nama_pemilik', 'tahun_pembuatan', 'pajak', 'stnk', 'keterangan'
    ];

    public function kendaraan()
    {
        return $this->hasMany('App\Models\Kendaraan', 'id_mobil');
    }
}
