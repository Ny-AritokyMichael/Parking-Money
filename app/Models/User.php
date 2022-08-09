<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getArgent($user_id)
    {
        $rechargeAccepte = RechargePorteFeuille::where('user_id', $user_id)
            ->where('valide', '=', true)
            ->groupBy('user_id')
            ->selectRaw('SUM(montant) as montant')
            ->get();
        if (count($rechargeAccepte) > 0) {
            $rechargeAccepte = $rechargeAccepte[0]->montant;
        } else {
            $rechargeAccepte = 0;
        }
        $sommePayement = Payement::where('user_id', $user_id)
            ->groupBy('user_id')
            ->selectRaw('SUM(montant) as montant')
            ->get();
        if (count($sommePayement) > 0) {
            $sommePayement = $sommePayement[0]->montant;
        } else {
            $sommePayement = 0;
        }
        return $rechargeAccepte - $sommePayement;
    }
}
