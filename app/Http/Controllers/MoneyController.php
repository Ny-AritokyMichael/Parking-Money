<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\DB;
use App\Models\Money;
use Illuminate\Http\Request;

class MoneyController extends Controller
{
    public static  function addMoney(Request $request, $id)
    {
        $money = $request->money;

        $validate = Money::create([
            'money' => $money,
            'user_id' => $id
        ]);

        return back();
    }

    public  static  function listMoney()
    {
        $money = Money::all();

        return view('admin.payment', [
            'money' => $money
        ]);
    }


    public static  function valider($id)
    {
        $money = DB::table('money')
        ->where('user_id', $id)
        ->get();

        $user = DB::table('users')
        ->where('id', $id)
        ->get();

        foreach ($user as $user) {
        foreach ($money as $money) {
            $user = DB::table('users')
            ->where('id', $money->user_id)
            ->update([
            'money' => $user->money + $money->money
        ]);
        }

        DB::delete('delete from money where user_id = ?', [$id]);
    }

        return back();
    }
}
