<?php

namespace App\Http\Livewire\Recette;

use Livewire\Component;
use App\Models\Produit;

class RecetteInsert extends Component
{
    public $produits = array();

    public $recherche = '';

    public $produitRecette = array();

    public $nomRecette = '';

    public function render()
    {
        if ($this->recherche != '') {
            $this->produits = Produit::with('categorieProduit')->with('uniteQuantite')->get();
        } else {

            $this->produits = Produit::where('nom', 'like', '%' . $this->recherche . '%')->get();
        }
        return view('livewire.recette.recette-insert');
    }
}
