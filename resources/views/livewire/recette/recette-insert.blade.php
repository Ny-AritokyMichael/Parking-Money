<x-app-layout>
    <x-slot name="content" >
        <main class="ps-main">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                            <h1 style="margin-bottom: 5vh;" >Inserer un produit</h1>
                            <div class="form-group form-group--inline">
                                <label>Quantite <span>*</span></label>
                                <input class="form-control" type="number" min=1 name="quantite">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Produit <span>*</span></label>
                                <input class="form-control" type="number" min=1 name="produit">
                            </div>
                            <div class="form-group form-group--inline">
                                <button type="submit" class="ps-btn ps-btn--fullwidth">Ajouter le produit<i class="ps-icon-next"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="ps-cart-listing">
                <table class="table ps-cart__table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantite</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produitRecette as $produit)
                            <tr>
                                <td style="font-size: 24px;" > {{ $produit->nom }} </td>
                                <td style="font-size: 24px;" > {{ $produit->quantite }}</td>
                                <td>
                                    <div class="ps-remove"></div>
                                  </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <ul>
                
            </ul>
        </main>
    </x-slot>
</x-app-layout>