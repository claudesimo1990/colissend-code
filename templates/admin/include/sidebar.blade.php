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

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-galeries" data-bs-toggle="collapse" href="#" aria-expanded="false">
                <i class="bi bi-menu-button-wide"></i><span>Galeries</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-galeries" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.gallery.index') }}">
                        <i class="bi bi-circle"></i><span>list</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-blog" data-bs-toggle="collapse" href="#" aria-expanded="false">
                <i class="bi bi-menu-button-wide"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-blog" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.blog.create') }}">
                        <i class="bi bi-circle"></i><span>Create</span>
                    </a>
                    <a href="{{ route('admin.blog.index') }}">
                        <i class="bi bi-circle"></i><span>index</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-blog" data-bs-toggle="collapse" href="#" aria-expanded="false">
                <i class="bi bi-menu-button-wide"></i><span>Shop</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-blog" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.shop.products.index') }}">
                        <i class="bi bi-circle"></i><span>Products</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</aside>
