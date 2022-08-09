<?php

namespace Database\Seeders;

use App\Models\ProduitRecette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitRecetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cote de porc
        ProduitRecette::create([
            'recette_id' => 1,
            'produit_id' => 1,
            'quantite' => 750,
        ]);
        ProduitRecette::create([
            'recette_id' => 1,
            'produit_id' => 2,
            'quantite' => 200,
        ]);
        ProduitRecette::create([
            'recette_id' => 1,
            'produit_id' => 4,
            'quantite' => 1000,
        ]);
        ProduitRecette::create([
            'recette_id' => 1,
            'produit_id' => 5,
            'quantite' => 1000,
        ]);
        ProduitRecette::create([
            'recette_id' => 1,
            'produit_id' => 6,
            'quantite' => 500,
        ]);

        // hena omby
        ProduitRecette::create([
            'recette_id' => 2,
            'produit_id' => 10,
            'quantite' => 500,
        ]);
        ProduitRecette::create([
            'recette_id' => 2,
            'produit_id' => 7,
            'quantite' => 600,
        ]);
        ProduitRecette::create([
            'recette_id' => 2,
            'produit_id' => 6,
            'quantite' => 100,
        ]);
        ProduitRecette::create([
            'recette_id' => 2,
            'produit_id' => 2,
            'quantite' => 50,
        ]);
    }
}
