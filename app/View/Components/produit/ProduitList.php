<?php

namespace App\View\Components\Produit;

use Illuminate\View\Component;
use App\Models\Produit;

class ProduitList extends Component
{
    public $produits = array();

    public $recherche = '';
    public $page = 1;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($recherche = '', $page = 1)
    {
        $this->recherche = $recherche;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if ($this->recherche == '') {
            $this->produits = Produit::with('categorieProduit')->paginate(8);
        } else {

            $this->produits = Produit::where('nom', 'like', '%' . $this->recherche . '%')->paginate(8);
        }
        return view('components.produit.produit-list');
    }
}
