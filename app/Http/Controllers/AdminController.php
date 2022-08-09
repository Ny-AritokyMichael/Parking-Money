<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Parking;
use App\Models\User;
use App\Models\Voiture;
use App\Models\VoitureSortant;
use App\Models\GetNow;

class AdminController extends Controller
{
    public static function loginAdmin()
    {
        return view('admin.index');
    }


    public static function page()
    {


        $parkings = DB::table('parkings')
        ->where('type', 'free')
        ->get();

        $voitures = DB::table('voiture_all')
        ->where('marque', '!=', 'null')
        ->get();

        // App\Models\Assurance::fn($visite->dateFinV)

        $tarifs = DB::table('tarifs')
        ->where('prix', '>', 0)
        ->get();

        // dd($tarifs);

        return view('admin.car', [
            'tarifs' => $tarifs,
            'parkings' => $parkings,
            'voitures' => $voitures
        ]);
    }


    public static function clientAff()
    {


        $users = DB::table('users')
        ->where('name', '!=', 'null')
        ->get();



        return view('admin.client', [
            'users' => $users
        ]);
    }

    public static function login(Request $request)
    {
        $users = DB::table('users')
        ->where('name', '!=', 'null')
        ->get();

        $admin = Admin::all();

        foreach ($admin as $admins) {
            if ($request->email == $admins->email && $request->mdp == $admins->mdp) {
                return view('admin.client', [
                    'admin' => $admin,
                    'users' => $users
                ]);
            } elseif ($request->email == $admins->email && $request->mdp != $admins->mdp) {
                return redirect('/')->with('error', 'verifier votre mot de passe');
            } elseif ($request->email != $admins->email && $request->mdp == $admins->mdp) {
                return redirect('/')->with('error', 'verifier votre email');
            }
        }
    }

    public function chartPage()
    {
        $infraction = \DB::table('voiture_all')
        // ->where('stockName','=','Infosys')
        ->where('etat', 'infraction')
        ->count();

        $libre = \DB::table('voiture_all')
        // ->where('stockName','=','Infosys')
        ->where('etat', 'free')
        ->count();

        $occupe = \DB::table('voiture_all')
        // ->where('stockName','=','Infosys')
        ->where('etat', 'busy')
        ->count();



        return view('admin.stat', [
            'infraction' => $infraction,
            'libre' => $libre,
            'occupe' => $occupe
        ]);
    }

    public function chart()
    {
        $result = \DB::table('chart')
                    ->get();
        // dd($result);
        return response()->json($result);
    }


    public function delete(Request $request)
    {

        // dd($request->date);
        $pourcentage = \DB::table('voiture_all')
        ->where('id', $request->id)
        ->get();

        $id = \DB::table('voiture_all')
        ->where('id', $request->id)
        ->get();

        // dd($id[0]);



        // dd($pourcentage[0]->pourcentage);


        if ($pourcentage[0]->pourcentage < 0) {
            $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->get();


            $tarif = DB::table('parkings')
            ->where('id', Auth::user()->id)
            ->get();

            $voiture = DB::table('voitures')
            ->where('id', $request->id)
            ->get();

            $retard = DB::table('voiture_all')
            ->where('id', $request->id)
            ->get();

            $amende = abs($retard[0]->amende);

            // dd($amende);


            if($user[0]->money >= $amende){

                foreach ($user as $user) {
                    $user = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update([
                    'money' => $user->money - $amende
                ]);
                }

                // dd(new DateTime('now'));

                DB::table('voitures')
                ->where('id', $request->id)
                ->update([
                    'marque' => 'null',
                    'numeroImmatricule' => 'null',
                    'dateDebut' => ' 2022-01-01 00:00:00',
                    'tarif_id' => 1,
                    'user_id' => 1,
                ]);


                DB::table('voiture_Entrants')
                ->where('id', $request->id)
                ->update([
                    'marque' => 'null',
                    'numeroImmatricule' => 'null',
                    'dateDebut' => ' 2022-01-01 00:00:00',
                    'tarif_id' => 1,
                    'user_id' => 1,
                ]);


                DB::table('voiture_Sortants')
                ->where('id', $request->id)
                ->update([
                    'numeroImmatricule' => 'null',
                    'dateFin' => ' 2022-01-01 00:00:00',
                ]);

                $parking = DB::table('parkings')
                ->where('id', $voiture[0]->parking_id)
                ->update([
                    'type' => 'free'
                ]);

                return back()->with('error', 'Merci de votre visite');
            }else{
                // dd('error');
                return back()->with('error', 'Vous n\'avez pas assez de solde');
            }



            // dd($voiture);

            // VoitureSortant::create([
            //     'numeroImmatricule' => $id[0]->numeroImmatricule,
            //     'dateFin' => $request->date,
            //     'parking_id' => $id[0]->id
            // ]);



        } else {
            $voiture = DB::table('voitures')
            ->where('id', $request->id)
            ->get();


            $parking = DB::table('parkings')
            ->where('id', $voiture[0]->parking_id)
            ->update([
                'type' => 'free'
            ]);

            // dd($parking);

            // VoitureSortant::create([
            //     'numeroImmatricule' => $id[0]->numeroImmatricule,
            //     'dateFin' => $request->date,
            //     'parking_id' => $id[0]->id
            // ]);


            DB::table('voitures')
            ->where('id', $request->id)
            ->update([
                'marque' => 'null',
                'numeroImmatricule' => 'null',
                'dateDebut' => ' 2022-01-01 00:00:00',
                'tarif_id' => 1,
                'user_id' => 1,
            ]);


            DB::table('voiture_Entrants')
            ->where('id', $request->id)
            ->update([
                'marque' => 'null',
                'numeroImmatricule' => 'null',
                'dateDebut' => ' 2022-01-01 00:00:00',
                'tarif_id' => 1,
                'user_id' => 1,
            ]);


            DB::table('voiture_Sortants')
            ->where('id', $request->id)
            ->update([
                'numeroImmatricule' => 'null',
                'dateFin' => ' 2022-01-01 00:00:00',
            ]);

            return back()->with('error', 'Merci de votre visite');
        }
    }

    public function getnow(Request $request)
    {
        $date = $request->date;

        // dd($date);

        if ($date == null) {
            DB::table('get_nows')
            ->where('id', 1)
            ->update([
                'dateGetNow' => '2022-01-01 00:00:00'
            ]);
        } else {
            DB::table('get_nows')
            ->where('id', 1)
            ->update([
                'dateGetNow' => $date
            ]);
        }


        return back();
    }


}
