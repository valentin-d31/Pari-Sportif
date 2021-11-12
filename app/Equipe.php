<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $guarded = [];

    public function matchs()
    {
        return $this->belongsToMany('App\Match');
    }
}
