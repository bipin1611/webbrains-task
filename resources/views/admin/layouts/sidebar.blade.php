
<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div class="aside-tools-label">
            <span><b>Web Brains - Task </b></span>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">

            <li>
                <a href="{{ route('admin.customers') }}"  class=" {{ request()->is('admin/customers') || request()->is('admin/customers/*') ? 'is-active router-link-active' : '' }}">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Customers</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
