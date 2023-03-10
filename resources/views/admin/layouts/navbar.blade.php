<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
        </a>
    </div>

    @if(session('success'))
        <div class="navbar-brand is-center">
            <div class="notification is-success">
                <button class="delete"></button>
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="navbar-brand is-center">
            <div class="notification is-danger">
                <button class="delete"></button>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <div class="navbar-menu fadeIn animated faster" id="navbar-menu">


        <div class="navbar-end">
            <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
                <a class="navbar-link is-arrowless">
                    <div class="is-user-name"><span>{{ \Auth::guard('admin')->user()->name }}</span></div>
                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="navbar-dropdown">

                    <a href="{{ route('admin.logout') }}" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log Out</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</nav>
