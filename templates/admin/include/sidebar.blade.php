<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.users.index') }}">
                <i class="bi bi-grid"></i>
                <span>Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
                <i class="bi bi-menu-button-wide"></i><span>Annonces</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.posts.travel') }}">
                        <i class="bi bi-circle"></i><span>Voyages</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.packs') }}">
                        <i class="bi bi-circle"></i><span>Colis</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.transactions.index') }}">
                <i class="bi bi-grid"></i>
                <span>Transactions</span>
            </a>
        </li>
    </ul>

</aside>
