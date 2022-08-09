<?php

namespace Database\Seeders;

use App\Models\CategorieProduit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategorieProduit::create([
            'categorie' => 'Viande'
        ]);
        CategorieProduit::create([
            'categorie' => 'Charcuterie'
        ]);
        CategorieProduit::create([
            'categorie' => 'Poisson'
        ]);
        CategorieProduit::create([
            'categorie' => 'Fromage'
        ]);
        CategorieProduit::create([
            'categorie' => 'Fruit'
        ]);
        CategorieProduit::create([
            'categorie' => 'Légume'
        ]);
        CategorieProduit::create([
            'categorie' => 'Céréale'
        ]);
        CategorieProduit::create([
            'categorie' => 'Boisson'
        ]);
    }
}
