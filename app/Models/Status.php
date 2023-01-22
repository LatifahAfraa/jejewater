<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status_ban';

    protected $primaryKey = 'id_status';

    protected $fillable = ['status'];

    public function ban()
    {
        return $this->hasMany('App\Models\Ban', 'id_status');
    }
}
