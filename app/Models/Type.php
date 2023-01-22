<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type_ban';

    protected $primaryKey = 'id_type';

    protected $fillable = ['nama_type'];

    public function ban()
    {
        return $this->hasMany('App\Models\Ban', 'id_type');
    }
}
