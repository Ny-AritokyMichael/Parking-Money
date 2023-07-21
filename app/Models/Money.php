<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public static function reste($heure,$min , $infraction){
    //     // $reste = ceil($heure % $infraction);
    //     // return 10000* $reste;


    //     $retour = 0;
    //     if($heure == 1){
    //         $reste = $infraction
    //     }
    // }

}
