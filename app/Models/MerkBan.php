<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerkBan extends Model
{
    protected $table = 'merk_ban';

    protected $primaryKey = 'merk_ban_id';

    protected $fillable = ['merk_ban_nama'];

    public function ban()
    {
        return $this->hasMany('App\Models\Ban', 'merk_ban_id');
    }
}
