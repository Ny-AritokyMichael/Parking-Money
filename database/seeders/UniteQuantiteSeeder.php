<?php

namespace Database\Seeders;

use App\Models\UniteQuantite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniteQuantiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UniteQuantite::create([
            'unite' => 'g',
        ]);
        UniteQuantite::create([
            'unite' => 'ml',
        ]);
        UniteQuantite::create([
            'unite' => 'bouteille',
        ]);
        UniteQuantite::create([
            'unite' => 'barquette',
        ]);
    }
}
