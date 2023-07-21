<?php

namespace App\View\Components\Produit;

use Illuminate\View\Component;
use App\Models\Produit;

class ProduitDetail extends Component
{

    public $produit;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($produit)
    {
        $this->produit =  $produit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.produit.produit-detail');
    }
}
