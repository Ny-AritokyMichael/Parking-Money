<?php

namespace Database\Seeders;

use App\Models\Recette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recette::create([
            'nom' => 'cote de porc au peit legume pour 4 personnes',
        ]);

        Recette::create([
            'nom' => 'Hen\' omby sy tsaramaso pour 4 personnes',
        ]);
    }
}
