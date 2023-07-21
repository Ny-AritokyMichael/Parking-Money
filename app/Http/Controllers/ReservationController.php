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

class ReservationController extends Controller
{
    public function page()
    {
        $reservation = DB::table('reservations')
        ->where('user_id', Auth::user()->id)
        ->get();

        // dd($reservation);




        $parkings = DB::table('voiture_all')
        ->where('type', 'free')
        ->get();

        $voitures = DB::table('voiture_all')
        ->where('user_id', Auth::user()->id)
        ->get();

        // App\Models\Assurance::fn($visite->dateFinV)

        $tarifs = DB::table('tarifs')
        ->where('prix', '>', 0)
        ->get();

        // dd($tarifs);


        return view('user.reservation', [
            'reservation' => $reservation,
            'tarifs' => $tarifs,
            'parkings' => $parkings,
            'voitures' => $voitures
        ]);
    }


    public function add(Request $request)
    {
        $reservation = DB::table('reservations')
        ->where('parking_id', $request->numeroParking)
        ->get();

        // dd($reservation);

        if ($reservation[0]->marque != null) {
            DB::table('reservations')
            ->where('parking_id', $request->numeroParking)
            ->update([
                'marque' => $request->marque,
                'numeroImmatricule' => $request->immatricule,
                'dateDebut' => $request->date,
                'user_id' => Auth::user()->id,
                'tarif_id' => $request->tarif
            ]);
        return back();

        }else{
            return back()->with('erreur','Desole, le parking est deja reserver!');
        }
    }



    public function delete($id){
        // dd($id);

        DB::table('reservations')
        ->where('id',$id)
        ->update([
            'marque' =>'null',
            'numeroImmatricule' =>'null',
            'dateDebut' =>'2022-01-01 00:00:00',
            'user_id' =>1,
            'tarif_id' => 1,
        ]);
        return back();
    }



    public function pageAdmin()
    {
        $reservation = DB::table('reservations')
        ->where('marque', '!=', 'null')
        ->get();


        $parkings = DB::table('voiture_all')
        ->where('type', 'free')
        ->get();

        // $voitures = DB::table('voiture_all')
        // ->where('user_id', Auth::user()->id)
        // ->get();

        // App\Models\Assurance::fn($visite->dateFinV)

        $tarifs = DB::table('tarifs')
        ->where('prix', '>', 0)
        ->get();

        // dd($tarifs);

        return view('admin.reservation', [
            'reservation' => $reservation,
            'tarifs' => $tarifs,
            'parkings' => $parkings,
            // 'voitures' => $voitures
        ]);
    }


    public function addAdmin(Request $request)
    {
        $reservation = DB::table('reservations')
        ->where('parking_id', $request->numeroParking)
        ->get();

        // dd($reservation);

        if ($reservation[0]->marque != null) {
            DB::table('reservations')
                ->where('id', $request->numeroParking)
                ->update([
                    'marque' => $request->marque,
                    'numeroImmatricule' => $request->immatricule,
                    'dateDebut' => $request->date,
                    'user_id' => Auth::user()->id,
                    'tarif_id' => $request->tarif
            ]);
            return back();

        }else{
            return back()->with('erreur','Desole, le parking est deja reserver!');
        }
    }



    public function deleteAdmin($id){
        // dd($id);

        DB::table('reservations')
        ->where('id',$id)
        ->update([
            'marque' =>'null',
            'numeroImmatricule' =>'null',
            'dateDebut' =>'2022-01-01 00:00:00',
            'user_id' =>1,
            'tarif_id' => 1,
        ]);
        return back();
    }
}
