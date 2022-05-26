<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link collapsed {{ (request()->routeIs('user.profile.index')) ? 'profile-dashboard-nav-active' : '' }}" href="{{  route('user.profile.index') }}">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bx bxs-plane dash-icon"></i>
                <span>Accueil</span>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('user.profile.board') }}" class="nav-link collapsed {{(request()->routeIs('user.profile.password')) || (request()->routeIs('user.profile.detail')) || (request()->routeIs('user.profile.paypal')) || (request()->routeIs('user.profile.bank')) || (request()->routeIs('user.profile.actions')) ||  (request()->routeIs('user.profile.edit')) || (request()->routeIs('user.friend.invitation')) || (request()->routeIs('user.profile.board')) ? 'profile-dashboard-nav-active' : '' }}">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bx bxs-user  dash-icon"></i>
                <span>Profil</span>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{  route('user.posts.packs') }}" class="nav-link collapsed {{ (request()->routeIs('user.posts.packs')) ? 'profile-dashboard-nav-active' : '' }}">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-box  dash-icon"></i>
                <span>Mes Colis</span>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{  route('user.posts.travels') }}" class="nav-link collapsed {{ (request()->routeIs('user.posts.travels')) ? 'profile-dashboard-nav-active' : '' }}">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bx bxs-plane  dash-icon"></i>
                <span>Mes Voyages</span>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{  route('user.posts.bookings') }}" class="nav-link collapsed {{ (request()->routeIs('user.posts.bookings')) ? 'profile-dashboard-nav-active' : '' }}">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bx bxs-business text-success"></i>
                <span>Reservations</span>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-euro dash-icon"></i>
                <span>Mes paiements</span>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('user.profile.messages') }}" class="nav-link collapsed {{(request()->routeIs('user.profile.actions')) ||  (request()->routeIs('user.profile.messages')) ? 'profile-dashboard-nav-active' : '' }}">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bx bxs-message  dash-icon"></i>
                <span>Messages</span>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bx bxs-notification  dash-icon"></i>
                <span>Notifications</span>
            </div>
        </a>
    </li>

</ul>