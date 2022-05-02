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
        <a href="{{  route('user.posts.index') }}" class="nav-link collapsed {{ (request()->routeIs('user.posts.index')) ? 'profile-dashboard-nav-active' : '' }}">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-box  dash-icon"></i>
                <span>Mes annonces</span>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bx bxs-plane  dash-icon"></i>
                <span>Mes livraisons</span>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <svg viewBox="0 0 24 24" class="road-icon  dash-icon">
                    <g>
                        <path d="M18.749 6.375a.817.817 0 01-.131-.011 1.125 1.125 0 01-.982-.983.698.698 0 010-.26c.06-.513.47-.923.982-.983a.717.717 0 01.262 0c.513.06.922.47.983.983a.796.796 0 010 .26c-.061.513-.47.923-.983.983a.817.817 0 01-.131.011z"></path>
                        <path d="M18.748 13.426a1.489 1.489 0 01-1.182-.577c-1.855-2.373-4.067-5.618-4.067-7.598 0-2.895 2.355-5.25 5.25-5.25s5.25 2.355 5.25 5.25c0 1.983-2.212 5.227-4.068 7.6a1.493 1.493 0 01-1.183.575zM18.749 1.5a3.754 3.754 0 00-3.75 3.75c0 1.159 1.437 3.717 3.75 6.676 2.313-2.957 3.75-5.515 3.75-6.676a3.754 3.754 0 00-3.75-3.75zM.749 24a.74.74 0 01-.689-.455.747.747 0 01-.007-.574l6-15a.746.746 0 01.976-.417.747.747 0 01.417.975l-6 15A.747.747 0 01.749 24zm21 0a.744.744 0 01-.696-.472l-3-7.5a.747.747 0 01.418-.975.745.745 0 01.974.419l3 7.5a.747.747 0 01-.418.975.75.75 0 01-.278.053zm-10.5 0a.75.75 0 01-.75-.75v-1.5a.75.75 0 011.5 0v1.5a.75.75 0 01-.75.75zm0-6a.75.75 0 01-.75-.75v-1.5a.75.75 0 011.5 0v1.5a.75.75 0 01-.75.75zm0-6a.75.75 0 01-.75-.75v-1.5a.75.75 0 011.5 0v1.5a.75.75 0 01-.75.75z"></path>
                    </g>
                </svg>
                <span>Mes trajets</span>
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