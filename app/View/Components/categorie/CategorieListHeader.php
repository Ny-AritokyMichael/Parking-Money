<?php

namespace App\View\Components\categorie;

use App\Models\CategorieProduit;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Log;

class CategorieListHeader extends Component
{
    public $categorieProduits;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categorieProduits = CategorieProduit::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.categorie.categorie-list-header');
    }
}
