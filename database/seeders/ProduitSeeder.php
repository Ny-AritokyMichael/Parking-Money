<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Produit;
use App\Models\CategorieProduit;
use App\Models\UniteQuantite;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Produit::create([
                'nom' => $faker->unique()->city,
                'categorie_produit_id' => $faker->numberBetween(1, CategorieProduit::count()),
                'prix_unitaire' => $faker->numberBetween(5000, 100000),
                'unite_quantite_id' => $faker->numberBetween(1, UniteQuantite::count()),
                'quantite' => $faker->numberBetween(1, 10000),
            ]);
        } */
        // 1
        Produit::create([
            'nom' => 'cote de porc',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 12000,
            'unite_quantite_id' => 1,
            'quantite' => 500,
            'emballage' => 'sachet',
        ]);
        // 2
        Produit::create([
            'nom' => 'huile',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 3500,
            'unite_quantite_id' => 2,
            'quantite' => 250,
            'emballage' => 'bouteille',
        ]);
        // 3
        Produit::create([
            'nom' => 'sel',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 500,
            'unite_quantite_id' => 1,
            'quantite' => 200,
            'emballage' => 'sachet',
        ]);
        // 4
        Produit::create([
            'nom' => 'pomme de terre',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 1650,
            'unite_quantite_id' => 1,
            'quantite' => 1000,
            'emballage' => 'pack',
        ]);
        //5
        Produit::create([
            'nom' => 'carotte',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 1300,
            'unite_quantite_id' => 1,
            'quantite' => 500,
            'emballage' => 'pack',
        ]);
        //6
        Produit::create([
            'nom' => 'poireau',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 1000,
            'unite_quantite_id' => 1,
            'quantite' => 330,
            'emballage' => 'pack',
        ]);
        //7
        Produit::create([
            'nom' => 'haricot',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 2200,
            'unite_quantite_id' => 1,
            'quantite' => 250,
            'emballage' => 'boite',
        ]);
        // 8
        Produit::create([
            'nom' => 'cristaline',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 9000,
            'unite_quantite_id' => 3,
            'quantite' => 6,
            'emballage' => 'pack',
        ]);
        //9
        Produit::create([
            'nom' => 'fromage',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 6600,
            'unite_quantite_id' => 1,
            'quantite' => 250,
            'emballage' => '',
        ]);
        //10
        Produit::create([
            'nom' => 'viande de boeuf',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 17320,
            'unite_quantite_id' => 1,
            'quantite' => 750,
            'emballage' => 'sachet',
        ]);
        //11
        Produit::create([
            'nom' => 'glace vanille choco',
            'categorie_produit_id' => 1,
            'prix_unitaire' => 21000,
            'unite_quantite_id' => 4,
            'quantite' => 750,
            'emballage' => 'barquette',
        ]);
    }
}
