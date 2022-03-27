<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container px-5">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{ asset('images/colissend/logo.png') }}" width="150px" alt="colissend-logo">
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
                    <a class="nav-link nav-item {{ (request()->routeIs('welcome')) ? 'active' : '' }}" aria-current="page" href="{{ route('welcome') }}">
                        <i class="bi bi-house"></i>
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('posts.index')) ? 'active' : '' }}" aria-current="page" href="{{ route('posts.index') }}">
                        <i class="bi bi-search"></i>
                        Voir les annonces
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('posts.travel.create')) ? 'active' : '' }}" aria-current="page" href="{{ route('posts.travel.create') }}">
                        <i class="bi bi-pencil-square"></i>
                        Proposer un trajet
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('posts.coli.create')) ? 'active' : '' }}" aria-current="page" href="{{ route('posts.coli.create') }}">
                        <i class="bi bi-box-seam"></i>
                        Expedier un colis
                    </a>
                </li>

                @guest()

                    <li class="nav-item">
                        <a class="nav-link nav-item {{ (request()->routeIs('register')) ? 'active' : '' }}" aria-current="page" href="{{ route('register') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Inscription
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-item {{ (request()->routeIs('login')) ? 'active' : '' }}" aria-current="page" href="{{ route('login') }}">
                            <i class="bi bi-people"></i>
                            Connexion
                        </a>
                    </li>

                @else

                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <x-avatar profile="{{ auth()->user()->profile }}" width="36" height="36" class="rounded-circle d-none d-sm-block"></x-avatar>
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>Colissend Member</h6>
                                <span>{{ auth()->user()->email }}</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile.show', [ 'profile' => auth()->user()->profile->id ]) }}">
                                    <i class="bi bi-person"></i>
                                    <span>Mon Profile</span>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile.show', ['profile' => Auth::id()]) . '?active=notifications' }}">
                                    <i class="bi bi-bell"></i>
                                    <div class="d-flex justify-content-between">
                                        <span>Notifications</span>
                                        <span class="badge badge-pill ml-2 text-success">3</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile.show', ['profile' => Auth::id()]) . '?active=messages' }}">
                                    <i class="bi bi-chat-left-text"></i>
                                    <div class="d-flex justify-content-between">
                                        <span>Messages</span>
                                        <span class="badge badge-pill ml-2 text-success">3</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile.show', ['profile' => Auth::id()]) . '?active=edit' }}">
                                    <i class="bi bi-gear"></i>
                                    <span>Configurations</span>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Deconnexion</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endguest

                <li class="nav-item">
                    <a class="nav-link nav-item {{ (request()->routeIs('contact')) ? 'active' : '' }}" aria-current="page" href="{{ route('contact') }}">
                        <i class="bi bi-envelope"></i>
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
