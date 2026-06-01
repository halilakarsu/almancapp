<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="white">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">



            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h text-muted"></i>
                    </span>
                    <h4 class="text-section text-german-red fw-bold text-uppercase small tracking-widest">İçerik
                        Yönetimi</h4>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.levels.*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#levels"
                        class="{{ request()->routeIs('admin.levels.*') ? '' : 'collapsed' }}"
                        aria-expanded="{{ request()->routeIs('admin.levels.*') ? 'true' : 'false' }}">
                        <i class="fas fa-graduation-cap"></i>
                        <p>Seviye İşlemleri</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.levels.*') ? 'show' : '' }}" id="levels">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('admin.levels.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.levels.index') }}">
                                    <span class="sub-item">Listele</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.levels.create') ? 'active' : '' }}">
                                <a href="{{ route('admin.levels.create') }}">
                                    <span class="sub-item">Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item {{ request()->routeIs('admin.lessons.*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#lessons"
                        class="{{ request()->routeIs('admin.lessons.*') ? '' : 'collapsed' }}"
                        aria-expanded="{{ request()->routeIs('admin.lessons.*') ? 'true' : 'false' }}">
                        <i class="fas fa-book-open"></i>
                        <p>Dersler</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.lessons.*') ? 'show' : '' }}" id="lessons">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('admin.lessons.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.lessons.index') }}">
                                    <span class="sub-item">Listele</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.lessons.create') ? 'active' : '' }}">
                                <a href="{{ route('admin.lessons.create') }}">
                                    <span class="sub-item">Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item {{ request()->routeIs('admin.cards.*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#cards-nav"
                        class="{{ request()->routeIs('admin.cards.*') ? '' : 'collapsed' }}"
                        aria-expanded="{{ request()->routeIs('admin.cards.*') ? 'true' : 'false' }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Alıştırmalar</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.cards.*') ? 'show' : '' }}" id="cards-nav">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('admin.cards.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.cards.index') }}">
                                    <span class="sub-item">Listele</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.cards.create') ? 'active' : '' }}">
                                <a href="{{ route('admin.cards.create') }}">
                                    <span class="sub-item">Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h text-muted"></i>
                    </span>
                    <h4 class="text-section text-german-red fw-bold text-uppercase small tracking-widest">Sistem</h4>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#users"
                        class="{{ request()->routeIs('admin.users.*') ? '' : 'collapsed' }}"
                        aria-expanded="{{ request()->routeIs('admin.users.*') ? 'true' : 'false' }}">
                        <i class="fas fa-users text-german-red"></i>
                        <p class="fw-bold">Kullanıcılar</p>
                        <span class="caret text-german-red"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.users.*') ? 'show' : '' }}" id="users">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.users.index') }}">
                                    <span class="sub-item">Listele</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.users.create') ? 'active' : '' }}">
                                <a href="{{ route('admin.users.create') }}">
                                    <span class="sub-item">Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->