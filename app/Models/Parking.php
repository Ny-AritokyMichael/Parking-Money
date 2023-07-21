<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;

class Parking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function details($id){

        $voiture = DB::table('voiture_all')
        ->where('id', $id)
        ->get();

        return $voiture;

    }
}
