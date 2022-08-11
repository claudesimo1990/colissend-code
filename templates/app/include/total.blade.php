<ul class="list-group list-group-flush">
    <li
            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
        Produits
        <span>{{ Cart::session(Auth()->user()->id)->getsubTotal()/100 }}€</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
        Livraison
        <span>Gratuit</span>
    </li>
    <li
            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
        <div>
            <strong>Total a payer</strong>
            <strong>
                <p class="mb-0">(TTC)</p>
            </strong>
        </div>
        <span><strong>{{ Cart::session(Auth()->user()->id)->getTotal()/100 }}€</strong></span>
    </li>
</ul>
