<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-white">

    <div class="container px-5">

        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{ asset('images/colissend/logo.svg') }}" width="150px" alt="colissend-logo">
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

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('blog.index')) ? 'active' : '' }}"
                       aria-current="page" href="{{ route('blog.index') }}">
                        <i class="bi bi-book"></i>
                        Blog
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
                                    <span class="visually-hidden">unread messages</span>
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
                                <a class="dropdown-item d-flex align-items-center"
                                   href="#">
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
                                   href="#">
                                    <i class="bi bi-box"></i>
                                    <div class="d-flex justify-content-between">
                                        <span>Mes annonces</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="#">
                                    <i class="bx bxs-plane text-success"></i>
                                    <span>Mes livraisons</span>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="#">
                                    <svg viewBox="0 0 24 24" class="road-icon">
                                        <g>
                                            <path d="M18.749 6.375a.817.817 0 01-.131-.011 1.125 1.125 0 01-.982-.983.698.698 0 010-.26c.06-.513.47-.923.982-.983a.717.717 0 01.262 0c.513.06.922.47.983.983a.796.796 0 010 .26c-.061.513-.47.923-.983.983a.817.817 0 01-.131.011z"></path>
                                            <path d="M18.748 13.426a1.489 1.489 0 01-1.182-.577c-1.855-2.373-4.067-5.618-4.067-7.598 0-2.895 2.355-5.25 5.25-5.25s5.25 2.355 5.25 5.25c0 1.983-2.212 5.227-4.068 7.6a1.493 1.493 0 01-1.183.575zM18.749 1.5a3.754 3.754 0 00-3.75 3.75c0 1.159 1.437 3.717 3.75 6.676 2.313-2.957 3.75-5.515 3.75-6.676a3.754 3.754 0 00-3.75-3.75zM.749 24a.74.74 0 01-.689-.455.747.747 0 01-.007-.574l6-15a.746.746 0 01.976-.417.747.747 0 01.417.975l-6 15A.747.747 0 01.749 24zm21 0a.744.744 0 01-.696-.472l-3-7.5a.747.747 0 01.418-.975.745.745 0 01.974.419l3 7.5a.747.747 0 01-.418.975.75.75 0 01-.278.053zm-10.5 0a.75.75 0 01-.75-.75v-1.5a.75.75 0 011.5 0v1.5a.75.75 0 01-.75.75zm0-6a.75.75 0 01-.75-.75v-1.5a.75.75 0 011.5 0v1.5a.75.75 0 01-.75.75zm0-6a.75.75 0 01-.75-.75v-1.5a.75.75 0 011.5 0v1.5a.75.75 0 01-.75.75z"></path>
                                        </g>
                                    </svg>
                                    <span>Mes trajets</span>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="#">
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
                @endguest
            </ul>
        </div>
    </div>
</nav>
