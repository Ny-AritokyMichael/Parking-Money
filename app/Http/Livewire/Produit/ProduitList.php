<?php

namespace App\Http\Livewire\Produit;

use Livewire\Component;
use App\Models\Produit;
use Illuminate\Support\Facades\Log;

class ProduitList extends Component
{
    public $produits = array();

    public $recherche = '';
    public $page = 1;
    public $produitParPage = 8;

    public function render()
    {
        if ($this->recherche == '') {
            $this->produits = Produit::with('categorieProduit')->get();
        } else {

            $this->produits = Produit::where('nom', 'like', '%' . $this->recherche . '%')->get();
        }
        return view('livewire.produit.produit-list');
    }
}
