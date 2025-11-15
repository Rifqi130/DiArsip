<div class="sidebar">
    <div class="sidebar-header">
        <div class="app-info">
            <div class="app-name">DiArsip</div>
            <div class="app-description">Sistem Arsip Digital</div>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ url('/dashboard') }}">
                <i class="bx bx-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-item {{ request()->is('documents*') ? 'active' : '' }}">
            <a href="{{ url('/documents') }}">
                <i class="bx bx-folder"></i>
                <span>Dokumen</span>
            </a>
        </li>
        <li class="menu-item {{ request()->is('categories*') ? 'active' : '' }}">
            <a href="{{ url('/categories') }}">
                <i class="bx bx-category"></i>
                <span>Kategori</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-footer">
        <div class="quick-menu">
            <div class="menu-label">Quick Menu</div>
            <div class="quick-actions">
                <a href="#" class="quick-action">
                    <i class="bx bx-data"></i>
                    <span>Backup Database</span>
                </a>
                <a href="#" class="quick-action">
                    <i class="bx bx-file"></i>
                    <span>Backup Dokumen</span>
                </a>
                <a href="#" class="quick-action">
                    <i class="bx bx-user"></i>
                    <span>Data User</span>
                </a>
            </div>
        </div>
    </div>
</div>