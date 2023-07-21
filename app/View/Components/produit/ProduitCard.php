<?php

namespace App\View\Components\produit;

use App\Models\Produit;
use Illuminate\View\Component;

class ProduitCard extends Component
{

    public Produit $produit;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Produit $produit)
    {
        $this->produit = $produit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.produit.produit-card');
    }
}
