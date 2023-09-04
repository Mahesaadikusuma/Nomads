<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item  {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li
            class="sidebar-item has-sub 
            {{ request()->is('admin/travel-package*') || request()->is('admin/gallery*') ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-stack"></i>
                <span>Komponen</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->is('admin/travel-package*') ? 'active' : '' }}">
                    <a href="{{ route('travel-package.index') }}">Paket Travel</a>
                </li>

                <li class="submenu-item {{ request()->is('admin/gallery*') ? 'active' : '' }}">
                    <a href="{{ route('gallery.index') }}">Gallery Travel</a>
                </li>
            </ul>
        </li>


        {{-- <li
            class="sidebar-item has-sub 
            {{ (request()->is('admin/travel-package') ? 'active' : 'tidak ada' && request()->is('admin/gallery')) ? 'active' : 'tidak ada' }}  ">
            <a href="#" class="sidebar-link">
                <i class="bi bi-stack"></i>
                <span>Component</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->is('admin/travel-package*') ? 'active' : '' }}">
                    <a href="{{ route('travel-package.index') }}">Paket Travel</a>
                </li>

                <li class="submenu-item {{ request()->is('admin/gallery*') ? 'active' : '' }}">
                    <a href="{{ route('gallery.index') }}">Gallery Travel</a>
                </li>


            </ul>
        </li> --}}

        <li class="sidebar-title">History Transaction</li>

        <li
            class="sidebar-item has-sub {{ request()->is('admin/transactionUser*') || request()->is('admin/transaction*') ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-cart"></i>
                <span>Transaksi</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->is('admin/transactionUser*') ? 'active' : '' }}">
                    <a href="{{ route('transactionUser.index') }}">Transaksi</a>
                </li>

                <li
                    class="submenu-item {{ request()->is('admin/transaction*') && !request()->is('admin/transactionUser*') ? 'active' : '' }}">
                    <a href="{{ route('transaction.index') }}">All Transaksi</a>
                </li>
            </ul>
        </li>





        <li class="sidebar-title">Settings</li>
        <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-gear-fill"></i>
                <span>Settings</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item">
                    <a href="Settings.html">Settings</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-title">

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="sidebar-link bg-transparent border-0" type="submit">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Log Out</span>
                </button>

            </form>

        </li>
    </ul>
</div>
