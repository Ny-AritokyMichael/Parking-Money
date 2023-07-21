<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\Auth;
use App\Models\Parking;
use App\Models\Voiture;
use App\Models\Reservation;
use App\Models\VoitureSortant;
use Carbon\Carbon;

class ParkingController extends Controller
{
    public function client()
    {
        $getnow = DB::table('get_nows')
        ->get();

        $etat = DB::table('chart')
        ->get();

        $free = DB::table('parkings')
        ->where('type', 'free')
        ->get();

        $busy = DB::table('voiture_all')
        ->where('etat','!=','free')
        ->where('user_id',Auth::user()->id)
        ->get();

        // dd($busy);

        // $voitures = DB::table('voiture_all')
        // ->where('user_id',Auth::user()->id)
        // ->get();

        // // App\Models\Assurance::fn($visite->dateFinV)

        $tarifs = DB::table('tarifs')
        ->where('prix','>', 0)
        ->get();

        // // dd($tarifs);

        // return view('user.car',[
        //     'tarifs' => $tarifs,
        //     'parkings' => $parkings,
        //     'voitures' => $voitures
        // ]);


        //----------------------------------------------------------------
        $parkings =  DB::table('voiture_all')
        ->orderBy('id', 'asc')
        // ->where('temps','!=', '0')
        ->get();

        // dd($parkings);

        $park = DB::table('parkings')->count();

        return view('parking', [
            'parkings' => $parkings,
            'park' => $park,
            'tarifs' => $tarifs,
            'free' => $free,
            'busy' => $busy,
            'getnow' => $getnow,
            'etat' => $etat
        ]);
    }



    public function page()
    {

        $etat = DB::table('chart')
        ->get();

        $getnow = DB::table('get_nows')
        ->get();

        $free = DB::table('voiture_all')
        ->where('etat', 'free')
        ->get();

        $busy = DB::table('voiture_all')
        ->where('etat','!=','free')
        ->get();

        // dd($busy);

        // $voitures = DB::table('voiture_all')
        // ->where('user_id',Auth::user()->id)
        // ->get();

        // // App\Models\Assurance::fn($visite->dateFinV)

        $tarifs = DB::table('tarifs')
        ->where('prix','>', 0)
        ->get();

        // // dd($tarifs);

        // return view('user.car',[
        //     'tarifs' => $tarifs,
        //     'parkings' => $parkings,
        //     'voitures' => $voitures
        // ]);


        //----------------------------------------------------------------
        $parkings =  DB::table('voiture_all')
        ->orderBy('id', 'asc')
        // ->where('temps','!=', '0')
        ->get();

        // dd($parkings);

        $park = DB::table('parkings')->count();

        return view('admin.parking', [
            'parkings' => $parkings,
            'park' => $park,
            'tarifs' => $tarifs,
            'free' => $free,
            'getnow' => $getnow,
            'busy' => $busy,
            'etat' => $etat,
        ]);
    }




    public function add(Request $request)
    {
        $numbers = $request->nombre;
        $date = $request->date;
        // dd($numbers);

        for ($i =1; $i<= $numbers; $i++) {
            $parkings =  Parking::create([
                'numeroParking' =>$i,
                'dateParking' =>$date,
                'type' => 'free'
            ]);
        }

        $parkings =  Parking::all();



        foreach ($parkings as $parking) {
            Voiture::updateOrCreate([
                'marque' =>'null',
                'numeroImmatricule' =>'null',
                'dateDebut' =>'2022-01-01 00:00:00',
                'user_id' =>1,
                'parking_id' =>$parking->id,
                'tarif_id' => 1,
            ]);


            Reservation::create([
                'marque' =>'null',
                'numeroImmatricule' =>'null',
                'dateDebut' =>'2022-01-01 00:00:00',
                'user_id' =>1,
                'parking_id' =>$parking->id,
                'tarif_id' => 1,
            ]);

            VoitureSortant::create([
                'numeroImmatricule' =>'null',
                'dateFin' =>'2022-01-01 00:00:00',
                'parking_id' =>$parking->id
            ]);
        }




        $free = DB::table('parkings')
        ->where('type', 'free')
        ->get();

        $busy = DB::table('parkings')
        ->where('type','!=','free')
        ->get();

        // dd($busy);

        // $voitures = DB::table('voiture_all')
        // ->where('user_id',Auth::user()->id)
        // ->get();

        // // App\Models\Assurance::fn($visite->dateFinV)

        $tarifs = DB::table('tarifs')
        ->where('prix','>', 0)
        ->get();

        // // dd($tarifs);

        // return view('user.car',[
        //     'tarifs' => $tarifs,
        //     'parkings' => $parkings,
        //     'voitures' => $voitures
        // ]);


        //----------------------------------------------------------------
        $parkings =  DB::table('voiture_all')
        ->orderBy('id', 'asc')
        // ->where('temps','!=', '0')
        ->get();

        // dd($parkings);

        $park = DB::table('parkings')->count();

        return view('admin.parking', [
            'parkings' => $parkings,
            'park' => $park,
            'tarifs' => $tarifs,
            'free' => $free,
            'busy' => $busy
        ]);
    }


    public function plusUn()
    {
        $id =  Parking::latest('id')->first()->id;
        $date =  Parking::latest('id')->first()->dateParking;


        $parkings =  Parking::create([
                'numeroParking' => $id + 1,
                'dateParking' => $date,
                'type' => 'free'
            ]);

        $parkings =  Parking::all();



        Voiture::updateOrCreate([
                'marque' =>'null',
                'numeroImmatricule' =>'null',
                'dateDebut' =>'2022-01-01 00:00:00',
                'user_id' =>1,
                'parking_id' =>$id + 1,
                'tarif_id' => 1,
            ]);


            Reservation::create([
                'marque' =>'null',
                'numeroImmatricule' =>'null',
                'dateDebut' =>'2022-01-01 00:00:00',
                'user_id' =>1,
                'parking_id' =>$id + 1,
                'tarif_id' => 1,
            ]);

            VoitureSortant::create([
                'numeroImmatricule' =>'null',
                'dateFin' =>'2022-01-01 00:00:00',
                'parking_id' =>$id + 1
            ]);

        $park = DB::table('parkings')->count();


        // $count = DB::table('parkings')->count();

        return back();
    }


}
