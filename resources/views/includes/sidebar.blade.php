<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('back/img/ADMIN.PNG') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            ADMIN
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>    
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="{{ url('/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                {{-- Data Barang --}}
                
                <li class="nav-item">
                    <a href="{{ url('/ManageBarang') }}">
                        <i class="fas fa-pen-square"></i>
                        <p>Manage Barang</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    {{-- <a data-toggle="collapse" href="#base"> --}}
                        <a href="{{ url('/DataBarang') }}">
                        <i class="fas fa-table"></i>
                        <p>Data Barang</p>
                    </a>
                </li>

                {{-- DETAIL PESANAN --}}
                <li class="nav-item">
                    {{-- <a data-toggle="collapse" href="#base"> --}}
                        <a href="{{ url('/DetailPesanan') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Detail Pesanan</p>
                       
                    </a>
                </li>
                {{-- TRANSAKSI --}}
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class=" fas fa-money-check-alt"></i>
                        <p>Detail Transaksi</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="widgets.html">
                        <i class="fas fa-desktop"></i>
                        <p>Widgets</p>
                        <span class="badge badge-success">4</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    <button type="submit" form="logout-form" class="btn-logout" style="color: #464646; border: none; padding: 8px 16px; cursor: pointer; display: flex; align-items: center; transition: background-color 0.3s ease;">
                        <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i>
                        <span style="font-size: 14px;">Logout</span>
                    </button>
                </li>


            </ul>
        </div>
    </div>
</div>