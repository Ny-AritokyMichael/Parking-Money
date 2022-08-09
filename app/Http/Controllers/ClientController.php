<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\DB;
use App\Models\User;
use App\Models\Parking;
use App\Models\Voiture;
use App\Models\VoitureEntrant;
use PDF;

class ClientController extends Controller
{
    public function page()
    {
        $parkings = DB::table('parkings')
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

        return view('user.car', [
            'tarifs' => $tarifs,
            'parkings' => $parkings,
            'voitures' => $voitures
        ]);
    }


    public function userParking()
    {
        // date_default_timezone_set('Indian/Antananarivo');
        // $date = date('d-M-Y H:i:s');
        // $fin = strtotime(date('H:i:s'));

        // // dd($fin);



        // foreach ($voitures  as $voitures) {
        //     $date = $voitures->created_at;
        //     $date_arr = explode(" ",$date);

        //     $debut = strtotime($date_arr[1]);
        //     dd(($fin - $debut)/60);
        // }


        $parkings =  DB::table('parking_all')
        ->orderBy('id', 'asc')
        ->get();

        $park = DB::table('parkings')->count();

        return view('admin.parkings', [
            'parkings' => $parkings,
            'park' => $park
        ]);
    }


    // public function pageCar()
    // {
    //     $parkings = DB::table('parkings')
    //     ->where('type', 'free')
    //     ->get();

    //     $tarifs = DB::table('tarifs')
    //     ->get();

    //     return view('user.car',[
    //         'tarifs' => $tarifs,
    //         'parkings' => $parkings
    //     ]);
    // }



    public function money()
    {

        // $count = DB::table('parkings')->count();
        $users =  User::all();

        return view('user.payment', [
            'users' => $users
        ]);
    }

    public function addCar(Request $request)
    {
        // dd($request->tarif);

        $user = DB::table('users')
        ->where('id', Auth::user()->id)
        ->get();

        $tarif = DB::table('tarifs')
        ->where('id', $request->tarif)
        ->get();

        // dd($tarif[0]->prix);

        if($money = $user[0]->money < $tarif[0]->prix){
            return back()->with('erreur','Vous n\'avez pas assez de solde');
        }else{
            $voiture = DB::table('voitures')
        ->where('parking_id', $request->numeroParking)
        ->update([
            'marque' => $request->marque,
            'numeroImmatricule' => $request->immatricule,
            'dateDebut' => $request->date,
            'user_id' => Auth::user()->id,
            // 'parking_id', $request->numeroParking,
            'tarif_id' => $request->tarif
        ]);

        // dd($voiture);

        DB::table('voiture_Entrants')
        ->where('parking_id', $request->numeroParking)
        ->update([
            'marque' => $request->marque,
            'numeroImmatricule' => $request->immatricule,
            'dateDebut' => $request->date,
            'user_id' => Auth::user()->id,
            // 'parking_id', $request->numeroParking,
            'tarif_id' => $request->tarif
        ]);


        DB::table('voiture_Sortants')
        ->where('parking_id', $request->numeroParking)
        ->update([
            'numeroImmatricule' => $request->immatricule,
            'dateFin' => '2022-01-01 00:00:00'
        ]);




        $parkings = DB::table('parkings')
        ->where('id', $request->numeroParking)
        ->update([
            'type' => 'busy',
        ]);

        foreach ($user as $user) {
            foreach ($tarif as $tarif) {
                $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
            'money' => $user->money - $tarif->prix
        ]);
            }
        }

        return back();
        }




    }

    public function enlever($id, $pourcentage)
    {
        // dd($pourcentage);

        if ($pourcentage < 0) {
            $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->get();


            $tarif = DB::table('parkings')
            ->where('id', Auth::user()->id)
            ->get();

            $voiture = DB::table('voitures')
            ->where('id', $id)
            ->get();



            dd(new DateTime('now'));


            foreach ($user as $user) {
                $user = DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                'money' => $user->money - 150000
            ]);
            }

            DB::table('voitures')
            ->where('id', $id)
            ->update([
                'marque' => 'null',
                'numeroImmatricule' => 'null',
                'dateDebut' => '2022-01-01 00:00:00',
                // 'dateFin' => ' 2022-01-01 00:00:00',
                'tarif_id' => 1,
                'user_id' => 1,
            ]);

            $parking = DB::table('parkings')
            ->where('id', $voiture[0]->parking_id)
            ->update([
                'type' => 'free'
            ]);

            return back()->with('error', 'Merci de votre visite');
        } else {
            $voiture = DB::table('voitures')
            ->where('id', $id)
            ->get();


            $parking = DB::table('parkings')
            ->where('id', $voiture[0]->parking_id)
            ->update([
                'type' => 'free'
            ]);

            // dd($parking);

            DB::table('voitures')
            ->where('id', $id)
            ->update([
                'marque' => 'null',
                'numeroImmatricule' => 'null',
                'dateDebut' => '2022-01-01 00:00:00',
                'tarif_id' => 1,
                'user_id' => 1,
            ]);

            return back()->with('error', 'Merci de votre visite');
        }
    }

    public function ajout($id)
    {
        dd($id);

        $voitures = DB::table('voitures')
        ->where('id', $id)
        ->get();

        return view('details', [
            'voitures' => $voitures
        ]);
    }

    public function getPdf($id)
    {
        $voitures = DB::table('voiture_all')
        ->where('id', $id)
        ->get();

        // dd($voitures);


        return $pdf = PDF::loadView('user.pdf', compact('voitures'))
        ->setPaper('a20', 'landscape')
        // ->setWarning(false)
        ->save(public_path("storage/fichier.pdf"))
        ->stream();

        // $pdf = PDF::loadView('user.pdf');
        // return $pdf->download('pdf.pdf');
    }
}
