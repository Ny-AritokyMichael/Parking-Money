<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\Models\Parking;
use App\Models\Voiture;

class Voiture extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dateFormat = 'Y-m-d H:i';


    public static function pourcentage($heure,$temps)
    {
        $retour = ($heure * 100) / $temps;

        return $retour;
    }

    public static function reste($debut,$temps)
    {
        // // date_default_timezone_set('Indian/Antananarivo');
        // // $date = date('d-M-Y H:i:s');
        // // $fin = ((strtotime(date('H:i:s')))/60)- 180;


        // // $date_arr = explode(" ", $debut);

        // // $debut = (strtotime($date_arr[1]))/60;

        // // $total = $temps + $debut;

        // // $reste = ($total-$fin)/60;

        // $now = Carbon::now();
        // $create_at  = Carbon::parse($debut);
        // $reste = ($create_at->diffInSeconds($now)/60) - $temps;
        // App\Models\Voiture::reste();

        date_default_timezone_set('Indian/Antananarivo');
            $date = date('d-M-Y H:i:s');
            // dd(date('H:i:s'));
            $heure = date('H') *60;
            $minute = date('i') ;
            $sec = date('H')/60;

            $fin = $heure + $minute + $sec;


            // $fin = (strtotime(date('H:i:s')))/60;

            // dd($fin);

            $debutHeure = Carbon::createFromFormat('H:i:s', $debut);
            // $ora = explode(":", $date_arr);
            $heur = $debutHeure->hour;
            $min = $debutHeure->minute;
            $s = $debutHeure->second;

            $debut = $heur + $min + $s + 180 + $temps;

            // dd($debut);

            $reste = $debut-$fin;

        return $reste;
    }
}
