<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $guarded = [];

            const CONST_VALUES = [
            '0' => '🥵0,50',
            '1' => '🥶0,80',
            '2' => '🧐1',
            '3' => '🥳1,20',
            '4' => '🤓1,50',
            '5' => '😳5😲'
            ];

    /*Retourne ma constante CONST_VALUES
    self fais reference à la classe courante
    me retourne un tableau */
    public function getCote()
    {
        return self::CONST_VALUES;
    }

    /*Retourne la valeur souhaitée de ma constante CONST_VALUES
    me retourne une string */
    public function getCoteValue($index)
    {
        return self::CONST_VALUES[$index];
    }


    public function equipes()
    {
        return $this->hasMany('App\equipe');
    }

}
