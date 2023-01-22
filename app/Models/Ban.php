<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table = 'ban';

    protected $primaryKey = 'id_ban';

    protected $fillable = [
        'no_seri_ban', 'merk_ban_id', 'id_type', 'id_status', 'id_kondisi', 'tgl_masuk'
    ];

    public function merk()
    {
        return $this->belongsTo('App\Models\MerkBan', 'merk_ban_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'id_type');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'id_status');
    }

    public function kondisi()
    {
        return $this->belongsTo('App\Models\Kondisi', 'id_kondisi');
    }
}
