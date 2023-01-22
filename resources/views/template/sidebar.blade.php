<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('home') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-menu-1"></i>
                    <span class="nav-text">Master</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('mobil') }}">Mobil</a></li>
                    <li><a href="{{ route('sopir') }}">Sopir</a></li>
                    <li><a href="{{ route('type') }}">Type Ban</a></li>
                    <li><a href="{{ url('admin/merk-ban') }}">Merk Ban</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-add-3"></i>
                    <span class="nav-text">Registrasi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('ban') }}">Ban</a></li>
                    <li><a href="{{ route('kendaraan') }}">Mobil</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Ban</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('pemakaian-ban/pengambilan-ban') }}">Pengambilan</a></li>
                    <li><a href="{{ url('pemakaian-ban/pengembalian-ban') }}">Pengembalian</a></li>
                </ul>
            </li>
            {{-- <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Laporan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">History Ban</a></li>
                    <li><a href="#">History Mobil</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
