<nav class="navbar navbar-expand-lg navbar-light bg-white">

    <div class="container">

        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{ asset('images/colissend/logo.svg') }}" width="150px" height="auto" alt="colissend-logo">
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="true"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse header-nav navbar-collapse" id="navbarSupportedContent">

            <ul class="d-flex align-items-center ms-auto nav-list-item">

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('welcome')) ? 'active' : '' }}"
                       aria-current="page" href="{{ route('welcome') }}">
                        <i class="bi bi-house"></i>
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('posts.index')) ? 'active' : '' }}"
                       aria-current="page" href="{{ route('posts.index') }}">
                        <i class="bi bi-search"></i>
                        Voir les annonces
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('posts.travel.create')) ? 'active' : '' }}"
                       aria-current="page" href="{{ route('posts.travel.create') }}">
                        <i class="bi bi-pencil-square"></i>
                        Proposer un trajet
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('posts.coli.create')) ? 'active' : '' }}"
                       aria-current="page" href="{{ route('posts.coli.create') }}">
                        <i class="bi bi-box-seam"></i>
                        Expedier un colis
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('blog.index')) ? 'active' : '' }}" aria-current="page" href="{{ route('blog.index') }}">
                        <i class="bi bi-chat"></i>
                        Forum
                    </a>
                </li>-->

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link nav-item {{ (request()->routeIs('blog.index')) ? 'active' : '' }}"--}}
{{--                       aria-current="page" href="{{ route('blog.index') }}">--}}
{{--                        <i class="bi bi-book"></i>--}}
{{--                        Blog--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('shop.index')) ? 'active' : '' }}"
                       aria-current="page" href="{{ route('shop.index') }}">
                        <i class="bi bi-shop"></i>
                        Shop
                    </a>
                </li>

                @guest()

                    <li class="nav-item">
                        <a class="nav-link nav-item {{ (request()->routeIs('register')) ? 'active' : '' }}"
                           aria-current="page" href="{{ route('register') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            S'inscrire
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-item {{ (request()->routeIs('login')) ? 'active' : '' }}"
                           aria-current="page" href="{{ route('login') }}">
                            <i class="bi bi-people"></i>
                            Se connecter
                        </a>
                    </li>

                @else

                    @if(unreadMessages() > 0)
                        <li class="nav-item">
                            <a class="nav-link nav-item position-relative" href="{{ route('user.profile.messages') }}">
                                <i class="bi bi-envelope-fill"></i>
                                    <span class="text-danger small position-absolute top-0 border rounded">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ unreadMessages() }}+
                                        <span class="visually-hidden">messages non lus</span>
                                    </span>
                                </span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                           data-bs-toggle="dropdown">
                            <x-avatar width="36" height="36" class="rounded-circle d-none d-sm-block"></x-avatar>
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->firstname }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="{{ route('user.profile.index') }}">
                                    <i class="bi bi-house"></i>
                                    <span>Accueil</span>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="{{ route('user.profile.board') }}">
                                    <i class="bi bi-person"></i>
                                    <div class="d-flex justify-content-between">
                                        <span>Mon Profil</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="{{ route('user.posts.packs') }}">
                                    <i class="bi bi-box"></i>
                                    <div class="d-flex justify-content-between">
                                        <span>Mes Colis</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="{{ route('user.posts.travels') }}">
                                    <i class="bx bxs-plane text-success"></i>
                                    <span>Mes Voyages</span>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="{{ route('user.posts.bookings') }}">
                                    <i class="bx bxs-business text-success"></i>
                                    <span>Mes Reservations</span>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="{{ route('user.profile.board') }}">
                                    <i class="bi bi-currency-euro"></i>
                                    <span>Mes paiements</span>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <i class="bi bi-arrow-right-circle text-danger"></i>
                                    <span>Me déconnecter</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <x-shopping-cart></x-shopping-cart>

                @endguest
            </ul>
        </div>
    </div>
</nav>
