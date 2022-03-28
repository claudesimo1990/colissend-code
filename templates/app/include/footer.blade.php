<!-- Footer -->
<footer class="page-footer font-small bg-success-light teal pt-5 mt-5">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-3 mt-md-0 mt-3">
                <div class="text-uppercase bg__title">Colissend</div>
                <p>Votre services d'echange, d'envoie de Packets et achat de Kilos entre Particuliers</p>
            </div>
            <div class="col-md-3 mt-md-0 mt-3">
                <div class="text-uppercase bg__title">Products</div>
                <ul class="list-unstyled text-center">
                    <li><a class="text-success" href="{{ route('welcome') }}">Accueil</a></li>
                    <li><a class="text-success" href="{{ route('posts.index') }}">Annonces</a></li>
                    <li><a class="text-success" href="{{ route('posts.travel.create') }}">Poster un Trajet</a></li>
                    <li><a class="text-success" href="{{ route('posts.coli.create') }}">Expedier un colis</a></li>
                </ul>
            </div>

            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3">
                <div class="text-uppercase bg__title">Support</div>
                <ul class="list-unstyled">
                    <li><a class="text-success" href="{{ route('welcome') }}">Blog</a></li>
                    <li><a class="text-success" href="{{ route('contact') }}">Contact</a></li>
                    <li><a class="text-success" href="{{ route('faq') }}">Faq</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-md-0 mb-3">
                <div class="text-uppercase bg__title">Company</div>
                <ul class="list-unstyled">
                    <li><a class="text-success" href="{{ route('about-us') }}">A-propos de nous</a></li>
                    <li><a class="text-success" href="{{ route('impressum') }}">Impressum</a></li>
                    <li><a class="text-success" href="{{ route('welcome') }}">Conditions d'utilisations</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3 bg-footer">© 2022 Copyright:
        <a href="https://mdbootstrap.com/" class="text-success">simweb.com</a>
    </div>
    <cookie-component></cookie-component>
</footer>