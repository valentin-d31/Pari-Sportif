<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pari extends Model
{
    public function formatCoast()
    {
        $coast = $this->coast / 100;

        return number_format($coast, 2, '.', '.') .'%';
    }
}
