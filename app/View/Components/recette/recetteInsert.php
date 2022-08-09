<?php

namespace App\View\Components\recette;

use App\Models\Produit;
use Illuminate\View\Component;

class recetteInsert extends Component
{

    public $produitRecette = [];
    public $produits = [];
    public $selectedProduit = null;
    public $selectedQuantity = 0;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($produits)
    {
        $this->produits = $produits;
        $this->produitRecette = [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.recette.recette-insert', [
            'produits' => $this->produits,
            'produitRecette' => $this->produitRecette,
        ]);
    }

    public function ajouterProduitRecette()
    {
        $this->selectedProduit->quantite = $this->selectedQuantity;
        // $produitRecette[] = $selectedProduit;
    }
}
