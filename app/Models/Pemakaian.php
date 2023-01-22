<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    protected $table = 'pemakaian_ban';

    protected $primaryKey = 'pemakaian_id';

    protected $fillable = ['tgl_ambil', 'kendaraan_id', 'ban_id', 'km_ambil', 'keterangan_ambil', 'kondisi_ambil', 'tgl_kembali', 'km_kembali', 'jarak_km', 'keterangan_kembali', 'kondisi_kembali'];

    public function kondisi()
    {
        return $this->belongsTo('App\Models\Kondisi', 'id_kondisi');
    }

    public function kendaraan()
    {
        return $this->belongsTo('App\Models\Kendaraan', 'kendaraan_id');
    }

    public function ban()
    {
        return $this->belongsTo('App\Models\Ban', 'ban_id');
    }
}
