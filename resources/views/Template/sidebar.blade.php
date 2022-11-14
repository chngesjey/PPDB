<div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{route('dashboard')}}" class="text-white">Inventory</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{route('dashboard')}}" class="text-white">INV</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ request()->is('dashboard*') ? 'active' : ''}}">
                            <a href="{{ route('dashboard')}}" class="text-white">
                                <i class="fas fa-fire"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-header">Master</li>

                        <li class="{{ request()->is('barang*') ? 'active' : ''}}">
                            <a href="{{ route('barang.index')}}" class="text-white">
                                <i class="fas fa-boxes"></i>
                                <span>Barang</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('tempat*') ? 'active' : ''}}">
                            <a href="{{ route('tempat.index') }}" class="text-white">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Tempat</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('kategori*') ? 'active' : ''}}">
                            <a href="{{ route('kategori.index') }}" class="text-white">
                                <i class="fas fa-list"></i>
                                <span>Kategori</span>
                            </a>
                        </li>

                        <li class="menu-header">Setting</li>

                        <li class="{{ request()->is('user*') ? 'active' : ''}}">
                            <a href="#" class="text-white">
                                <i class="fas fa-boxes"></i>
                                <span>User</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('setting*') ? 'active' : ''}}">
                            <a href="#" class="text-white">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Setting</span>
                            </a>
                        </li>
                        
                </aside>
            </div>