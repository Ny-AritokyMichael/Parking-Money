<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            Stock::create([
                'produit_id' => $faker->numberBetween(2, Produit::count()),
                'prix_unitaire' => $faker->numberBetween(5000, 10000),
                'quantite' => $faker->numberBetween(100, 150),
            ]);
        } */
        $multiplicateur = 100;
        Stock::create([
            'produit_id' => 1,
            'prix_unitaire' => 12000,
            'quantite' => $multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 2,
            'prix_unitaire' => 3500,
            'quantite' =>$multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 3,
            'prix_unitaire' => 500,
            'quantite' => $multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 4,
            'prix_unitaire' => 1650,
            'quantite' =>  $multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 5,
            'prix_unitaire' => 1300,
            'quantite' =>  $multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 6,
            'prix_unitaire' => 1000,
            'quantite' => $multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 7,
            'prix_unitaire' => 2200,
            'quantite' => $multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 8,
            'prix_unitaire' => 9000,
            'quantite' => $multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 9,
            'prix_unitaire' => 6600,
            'quantite' => $multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 10,
            'prix_unitaire' => 17320,
            'quantite' => $multiplicateur,
        ]);

        Stock::create([
            'produit_id' => 11,
            'prix_unitaire' => 21000,
            'quantite' => $multiplicateur,
        ]);
    }
}
